<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Uf Controller
 *
 * @property \App\Model\Table\UfTable $Uf
 *
 * @method \App\Model\Entity\Uf[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UfController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $uf = $this->paginate($this->Uf);

        $this->set(compact('uf'));
    }

    /**
     * View method
     *
     * @param string|null $id Uf id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $uf = $this->Uf->get($id, [
            'contain' => [],
        ]);

        $this->set('uf', $uf);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $uf = $this->Uf->newEntity();
        if ($this->request->is('post')) {
            $uf = $this->Uf->patchEntity($uf, $this->request->getData());
            if ($this->Uf->save($uf)) {
                $this->Flash->success(__('The uf has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uf could not be saved. Please, try again.'));
        }
        $this->set(compact('uf'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Uf id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $uf = $this->Uf->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $uf = $this->Uf->patchEntity($uf, $this->request->getData());
            if ($this->Uf->save($uf)) {
                $this->Flash->success(__('The uf has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uf could not be saved. Please, try again.'));
        }
        $this->set(compact('uf'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Uf id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $uf = $this->Uf->get($id);
        if ($this->Uf->delete($uf)) {
            $this->Flash->success(__('The uf has been deleted.'));
        } else {
            $this->Flash->error(__('The uf could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function getUf()
    {
        try {
            $data = $this->request->getData();
            $id_uf = $data['id_uf'];
            $uf = $this->Uf->find('all')->where(['id' => $id_uf])->first();
            if ($uf) {
                $this->response->body(json_encode(['status' => 'success', 'message' => $uf]));
                return $this->response;
            } else {
                $this->response->body(json_encode(['status' => 'error', 'message' => 'Nenhuma Cidade para esta UF']));
                return $this->response;
            }
        } catch (\Exception $e) {
            $this->response->body(json_encode(['status' => 'error', 'message' => $e->getMessage()]));
            return $this->response;
        }
    }
    public function getUfs()
    {
        try {
            $ufs = $this->Uf->find('all')->All();
            if ($ufs) {
                $this->response->body(json_encode(['status' => 'success', 'message' => $ufs]));
                return $this->response;
            } else {
                $this->response->body(json_encode(['status' => 'error', 'message' => 'Nenhuma Cidade para esta UF']));
                return $this->response;
            }
        } catch (\Exception $e) {
            $this->response->body(json_encode(['status' => 'error', 'message' => $e->getMessage()]));
            return $this->response;
        }
    }
}
