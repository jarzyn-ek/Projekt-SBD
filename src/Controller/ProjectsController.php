<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->Projects->find('all');

        if (!is_null($query_search = $this->request->getQuery('table_search')) && $query_search != '') {
            $query = $query->where([
                'name LIKE' => '%' . $query_search . '%'
            ]);
        }

        $projects = $this->paginate($query);

        $this->set(compact('projects'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Subcontractors', 'Workers', 'Budgets'],
        ]);

        $this->set('project', $project);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            list($start_date, $end_date) = explode(" - ", $this->request->data('daterange'));

            $project = $this->Projects->patchEntity($project, $this->request->getData());

            $project->start_date = new Time($start_date);
            $project->end_date = new Time($end_date);

            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The {0} has been saved.', 'Project'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Project'));
        }
        $subcontractors = $this->Projects->Subcontractors->find('list', ['limit' => 200]);
        $workers = $this->Projects->Workers->find('list', ['limit' => 200]);
        $this->set(compact('project', 'subcontractors', 'workers'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Subcontractors', 'Workers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The {0} has been saved.', 'Project'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Project'));
        }
        $subcontractors = $this->Projects->Subcontractors->find('list', ['limit' => 200]);
        $workers = $this->Projects->Workers->find('list', ['limit' => 200]);
        $this->set(compact('project', 'subcontractors', 'workers'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $project = $this->Projects->get($id, [
            'contain' => [
                'Budgets'
            ]
        ]);

        if ($project->budgets) {
            $this->Flash->error(__('The {0} could not be deleted. There are related {1} in database', 'Project', 'Budgets'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Project'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Project'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
