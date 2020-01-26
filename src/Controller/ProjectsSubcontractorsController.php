<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectsSubcontractors Controller
 *
 * @property \App\Model\Table\ProjectsSubcontractorsTable $ProjectsSubcontractors
 *
 * @method \App\Model\Entity\ProjectsSubcontractor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsSubcontractorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects', 'Subcontractors'],
        ];
        $projectsSubcontractors = $this->paginate($this->ProjectsSubcontractors);

        $this->set(compact('projectsSubcontractors'));
    }

    /**
     * View method
     *
     * @param string|null $id Projects Subcontractor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectsSubcontractor = $this->ProjectsSubcontractors->get($id, [
            'contain' => ['Projects', 'Subcontractors'],
        ]);

        $this->set('projectsSubcontractor', $projectsSubcontractor);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectsSubcontractor = $this->ProjectsSubcontractors->newEntity();
        if ($this->request->is('post')) {
            $projectsSubcontractor = $this->ProjectsSubcontractors->patchEntity($projectsSubcontractor, $this->request->getData());
            if ($this->ProjectsSubcontractors->save($projectsSubcontractor)) {
                $this->Flash->success(__('The {0} has been saved.', 'Projects Subcontractor'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Projects Subcontractor'));
        }
        $projects = $this->ProjectsSubcontractors->Projects->find('list', ['limit' => 200]);
        $subcontractors = $this->ProjectsSubcontractors->Subcontractors->find('list', ['limit' => 200]);
        $this->set(compact('projectsSubcontractor', 'projects', 'subcontractors'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Projects Subcontractor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectsSubcontractor = $this->ProjectsSubcontractors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectsSubcontractor = $this->ProjectsSubcontractors->patchEntity($projectsSubcontractor, $this->request->getData());
            if ($this->ProjectsSubcontractors->save($projectsSubcontractor)) {
                $this->Flash->success(__('The {0} has been saved.', 'Projects Subcontractor'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Projects Subcontractor'));
        }
        $projects = $this->ProjectsSubcontractors->Projects->find('list', ['limit' => 200]);
        $subcontractors = $this->ProjectsSubcontractors->Subcontractors->find('list', ['limit' => 200]);
        $this->set(compact('projectsSubcontractor', 'projects', 'subcontractors'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Projects Subcontractor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectsSubcontractor = $this->ProjectsSubcontractors->get($id);
        if ($this->ProjectsSubcontractors->delete($projectsSubcontractor)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Projects Subcontractor'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Projects Subcontractor'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
