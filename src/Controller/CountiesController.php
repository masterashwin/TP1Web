<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Counties Controller
 *
 * @property \App\Model\Table\CountiesTable $Counties
 *
 * @method \App\Model\Entity\County[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CountiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Regions'],
        ];
        $counties = $this->paginate($this->Counties);

        $this->set(compact('counties'));
    }

    /**
     * View method
     *
     * @param string|null $id County id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $county = $this->Counties->get($id, [
            'contain' => ['Regions', 'Cities'],
        ]);

        $this->set('county', $county);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $county = $this->Counties->newEntity();
        if ($this->request->is('post')) {
            $county = $this->Counties->patchEntity($county, $this->request->getData());
            if ($this->Counties->save($county)) {
                $this->Flash->success(__('The county has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The county could not be saved. Please, try again.'));
        }
        $regions = $this->Counties->Regions->find('list', ['limit' => 200]);
        $this->set(compact('county', 'regions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id County id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $county = $this->Counties->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $county = $this->Counties->patchEntity($county, $this->request->getData());
            if ($this->Counties->save($county)) {
                $this->Flash->success(__('The county has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The county could not be saved. Please, try again.'));
        }
        $regions = $this->Counties->Regions->find('list', ['limit' => 200]);
        $this->set(compact('county', 'regions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id County id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $county = $this->Counties->get($id);
        if ($this->Counties->delete($county)) {
            $this->Flash->success(__('The county has been deleted.'));
        } else {
            $this->Flash->error(__('The county could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
