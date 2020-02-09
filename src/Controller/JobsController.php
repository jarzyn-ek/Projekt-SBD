<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 *
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->Jobs->find('all', [
            'contain' => [
                'Departments'
            ]
        ]);

        if (!is_null($query_search = $this->request->getQuery('table_search')) && $query_search != '') {
            $query = $query->where([
                'OR' => [
                    'Jobs.name LIKE' => '%' . $query_search . '%',
                    'Departments.name LIKE' => '%' . $query_search . '%'
                ]
            ]);
        }

        $jobs = $this->paginate($query);

        $this->set(compact('jobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Departments', 'Workers'],
        ]);

        $this->set('job', $job);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The {0} has been saved.', 'Job'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Job'));
        }
        $departments = $this->Jobs->Departments->find('list', ['limit' => 200]);
        $workers = $this->Jobs->Workers->find('list', ['limit' => 200]);
        $this->set(compact('job', 'departments', 'workers'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Workers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The {0} has been saved.', 'Job'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Job'));
        }
        $departments = $this->Jobs->Departments->find('list', ['limit' => 200]);
        $workers = $this->Jobs->Workers->find('list', ['limit' => 200]);
        $this->set(compact('job', 'departments', 'workers'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Job'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Job'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
