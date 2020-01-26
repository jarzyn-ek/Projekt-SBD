<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subcontractors Controller
 *
 * @property \App\Model\Table\SubcontractorsTable $Subcontractors
 *
 * @method \App\Model\Entity\Subcontractor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubcontractorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $subcontractors = $this->paginate($this->Subcontractors);

        $this->set(compact('subcontractors'));
    }

    /**
     * View method
     *
     * @param string|null $id Subcontractor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subcontractor = $this->Subcontractors->get($id, [
            'contain' => ['Projects', 'Contracts'],
        ]);

        $this->set('subcontractor', $subcontractor);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subcontractor = $this->Subcontractors->newEntity();
        if ($this->request->is('post')) {
            $subcontractor = $this->Subcontractors->patchEntity($subcontractor, $this->request->getData());
            if ($this->Subcontractors->save($subcontractor)) {
                $this->Flash->success(__('The {0} has been saved.', 'Subcontractor'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Subcontractor'));
        }
        $projects = $this->Subcontractors->Projects->find('list', ['limit' => 200]);
        $this->set(compact('subcontractor', 'projects'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Subcontractor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subcontractor = $this->Subcontractors->get($id, [
            'contain' => ['Projects']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subcontractor = $this->Subcontractors->patchEntity($subcontractor, $this->request->getData());
            if ($this->Subcontractors->save($subcontractor)) {
                $this->Flash->success(__('The {0} has been saved.', 'Subcontractor'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Subcontractor'));
        }
        $projects = $this->Subcontractors->Projects->find('list', ['limit' => 200]);
        $this->set(compact('subcontractor', 'projects'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Subcontractor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        // $subcontractor = $this->Subcontractors->get($id);

        $subcontractor = $this->Subcontractors->get($id, [
            'contain' => [
                'Contracts'
            ]
        ]);

        //dd($department);

        if ($subcontractor->contracts) {
            $this->Flash->error(__('The {0} could not be deleted. There are related {1} in database', 'Subcontractor', 'Contracts'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Subcontractors->delete($subcontractor)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Subcontractor'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Subcontractor'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
