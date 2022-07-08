<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Cidade;
use Cake\ORM\TableRegistry;

/**
 * Cliente Controller
 *
 * @property \App\Model\Table\ClienteTable $Cliente
 *
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClienteController extends AppController
{
    public function getCidade()
    {
       try {
            $data = $this->request->getData();
            $id_Cidade = $data['id_Cidade'];
            $uf = TableRegistry::get('Uf');
            $uf = $uf->find('all')->where(['id' => $id_Cidade])->first();
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
    
    public function verifyCpf(){
        $data = $this->request->getData();
        $cpf = $data['cpf'];
        $cliente = TableRegistry::get('Cliente');
        $cliente = $cliente->find('all')->where(['cpf' => $cpf])->first();
        if($cliente){
            $this->response->body(json_encode(['status' => 'error', 'message' => 'CPF já cadastrado']));
            return $this->response;
        }else{
            $this->response->body(json_encode(['status' => 'ok', 'message' => 'CPF pode ser usado']));
            return $this->response;
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $cliente = $this->paginate($this->Cliente);

        $this->set(compact('cliente'));
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Cliente->get($id, [
            'contain' => [],
        ]);

        $this->set('cliente', $cliente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Cliente->newEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Cliente->patchEntity($cliente, $this->request->getData());
            if ($this->Cliente->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('cliente'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Cliente->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Cliente->patchEntity($cliente, $this->request->getData());
            if ($this->Cliente->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('cliente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Cliente->get($id);
        if ($this->Cliente->delete($cliente)) {
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
