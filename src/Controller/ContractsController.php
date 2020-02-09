<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Contracts Controller
 *
 * @property \App\Model\Table\ContractsTable $Contracts
 *
 * @method \App\Model\Entity\Contract[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContractsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->Contracts->find('all', [
            'contain' => [
                'Workers',
                'Subcontractors'
            ]
        ]);

        if (!is_null($query_search = $this->request->getQuery('table_search')) && $query_search != '') {
            $query = $query->where([
                'OR' => [
                    'Contracts.name LIKE' => '%' . $query_search . '%',
                    'Workers.first_name LIKE' => '%' . $query_search . '%',
                    'Workers.last_name LIKE' => '%' . $query_search . '%',
                    'Subcotractors.name LIKE' => '%' . $query_search . '%'
                ]
            ]);
        }

        $contracts = $this->paginate($query);

        $this->set(compact('contracts'));
    }

    /**
     * View method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contract = $this->Contracts->get($id, [
            'contain' => ['Workers', 'Subcontractors', 'Settlements'],
        ]);

        $this->set('contract', $contract);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contract = $this->Contracts->newEntity();
        if ($this->request->is('post')) {
            list($start_date, $end_date) = explode(" - ", $this->request->data('daterange'));

            $contract = $this->Contracts->patchEntity($contract, $this->request->getData());

            $contract->start_date = new Time($start_date);
            $contract->end_date = new Time($end_date);

            if ($this->Contracts->save($contract)) {
                $this->Flash->success(__('The {0} has been saved.', 'Contract'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Contract'));
        }
        $workers = $this->Contracts->Workers->find('list', ['limit' => 200]);
        $subcontractors = $this->Contracts->Subcontractors->find('list', ['limit' => 200]);
        $this->set(compact('contract', 'workers', 'subcontractors'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contract = $this->Contracts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            list($start_date, $end_date) = explode(" - ", $this->request->data('daterange'));

            $contract = $this->Contracts->patchEntity($contract, $this->request->getData());

            $contract->start_date = new Time($start_date);
            $contract->end_date = new Time($end_date);

            if ($this->Contracts->save($contract)) {
                $this->Flash->success(__('The {0} has been saved.', 'Contract'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Contract'));
        }
        $workers = $this->Contracts->Workers->find('list', ['limit' => 200]);
        $subcontractors = $this->Contracts->Subcontractors->find('list', ['limit' => 200]);
        $this->set(compact('contract', 'workers', 'subcontractors'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        // $contract = $this->Contracts->get($id);
        $contract = $this->Contracts->get($id, [
            'contain' => [
                'Settlements'
            ]
        ]);

        //dd($department);

        if ($contract->settlements) {
            $this->Flash->error(__('The {0} could not be deleted. There are related {1} in database', 'Contract', 'Settlements'));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->Contracts->delete($contract)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Contract'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Contract'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
