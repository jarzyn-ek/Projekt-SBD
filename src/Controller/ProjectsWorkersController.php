<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectsWorkers Controller
 *
 * @property \App\Model\Table\ProjectsWorkersTable $ProjectsWorkers
 *
 * @method \App\Model\Entity\ProjectsWorker[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsWorkersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects', 'Workers'],
        ];
        $projectsWorkers = $this->paginate($this->ProjectsWorkers);

        $this->set(compact('projectsWorkers'));
    }

    /**
     * View method
     *
     * @param string|null $id Projects Worker id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectsWorker = $this->ProjectsWorkers->get($id, [
            'contain' => ['Projects', 'Workers'],
        ]);

        $this->set('projectsWorker', $projectsWorker);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectsWorker = $this->ProjectsWorkers->newEntity();
        if ($this->request->is('post')) {
            $projectsWorker = $this->ProjectsWorkers->patchEntity($projectsWorker, $this->request->getData());
            if ($this->ProjectsWorkers->save($projectsWorker)) {
                $this->Flash->success(__('The {0} has been saved.', 'Projects Worker'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Projects Worker'));
        }
        $projects = $this->ProjectsWorkers->Projects->find('list', ['limit' => 200]);
        $workers = $this->ProjectsWorkers->Workers->find('list', ['limit' => 200]);
        $this->set(compact('projectsWorker', 'projects', 'workers'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Projects Worker id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectsWorker = $this->ProjectsWorkers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectsWorker = $this->ProjectsWorkers->patchEntity($projectsWorker, $this->request->getData());
            if ($this->ProjectsWorkers->save($projectsWorker)) {
                $this->Flash->success(__('The {0} has been saved.', 'Projects Worker'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Projects Worker'));
        }
        $projects = $this->ProjectsWorkers->Projects->find('list', ['limit' => 200]);
        $workers = $this->ProjectsWorkers->Workers->find('list', ['limit' => 200]);
        $this->set(compact('projectsWorker', 'projects', 'workers'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Projects Worker id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectsWorker = $this->ProjectsWorkers->get($id);
        if ($this->ProjectsWorkers->delete($projectsWorker)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Projects Worker'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Projects Worker'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
