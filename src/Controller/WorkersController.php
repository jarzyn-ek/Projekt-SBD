<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workers Controller
 *
 * @property \App\Model\Table\WorkersTable $Workers
 *
 * @method \App\Model\Entity\Worker[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Staffs'],
        // ];
        $workers = $this->paginate($this->Workers);

        $this->set(compact('workers'));
    }

    /**
     * View method
     *
     * @param string|null $id Worker id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $worker = $this->Workers->get($id, [
            'contain' => ['Staffs', 'Projects', 'Jobs', 'Contracts'],
        ]);

        $this->set('worker', $worker);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $worker = $this->Workers->newEntity();
        if ($this->request->is('post')) {
            $worker = $this->Workers->patchEntity($worker, $this->request->getData());
            if ($this->Workers->save($worker)) {
                $this->Flash->success(__('The {0} has been saved.', 'Worker'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Worker'));
        }
        $staffs = $this->Workers->Staffs->find('list', ['limit' => 200]);
        $projects = $this->Workers->Projects->find('list', ['limit' => 200]);
        $jobs = $this->Workers->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('worker', 'staffs', 'projects', 'jobs'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Worker id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $worker = $this->Workers->get($id, [
            'contain' => ['Projects', 'Jobs']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $worker = $this->Workers->patchEntity($worker, $this->request->getData());
            if ($this->Workers->save($worker)) {
                $this->Flash->success(__('The {0} has been saved.', 'Worker'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Worker'));
        }
        $staffs = $this->Workers->Staffs->find('list', ['limit' => 200]);
        $projects = $this->Workers->Projects->find('list', ['limit' => 200]);
        $jobs = $this->Workers->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('worker', 'staffs', 'projects', 'jobs'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Worker id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        // $worker = $this->Workers->get($id);

        $worker = $this->Workers->get($id, [
            'contain' => [
                'Contracts'
            ]
        ]);

        //dd($department);

        if ($worker->contracts) {
            $this->Flash->error(__('The {0} could not be deleted. There are related {1} in database', 'Worker', 'Contracts'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Workers->delete($worker)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Worker'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Worker'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
