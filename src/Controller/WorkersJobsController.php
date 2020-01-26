<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WorkersJobs Controller
 *
 * @property \App\Model\Table\WorkersJobsTable $WorkersJobs
 *
 * @method \App\Model\Entity\WorkersJob[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkersJobsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Workers', 'Jobs'],
        ];
        $workersJobs = $this->paginate($this->WorkersJobs);

        $this->set(compact('workersJobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Workers Job id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workersJob = $this->WorkersJobs->get($id, [
            'contain' => ['Workers', 'Jobs'],
        ]);

        $this->set('workersJob', $workersJob);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workersJob = $this->WorkersJobs->newEntity();
        if ($this->request->is('post')) {
            $workersJob = $this->WorkersJobs->patchEntity($workersJob, $this->request->getData());
            if ($this->WorkersJobs->save($workersJob)) {
                $this->Flash->success(__('The {0} has been saved.', 'Workers Job'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Workers Job'));
        }
        $workers = $this->WorkersJobs->Workers->find('list', ['limit' => 200]);
        $jobs = $this->WorkersJobs->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('workersJob', 'workers', 'jobs'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Workers Job id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workersJob = $this->WorkersJobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workersJob = $this->WorkersJobs->patchEntity($workersJob, $this->request->getData());
            if ($this->WorkersJobs->save($workersJob)) {
                $this->Flash->success(__('The {0} has been saved.', 'Workers Job'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Workers Job'));
        }
        $workers = $this->WorkersJobs->Workers->find('list', ['limit' => 200]);
        $jobs = $this->WorkersJobs->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('workersJob', 'workers', 'jobs'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Workers Job id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workersJob = $this->WorkersJobs->get($id);
        if ($this->WorkersJobs->delete($workersJob)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Workers Job'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Workers Job'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
