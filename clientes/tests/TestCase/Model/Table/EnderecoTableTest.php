<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnderecoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnderecoTable Test Case
 */
class EnderecoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnderecoTable
     */
    public $Endereco;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Endereco',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Endereco') ? [] : ['className' => EnderecoTable::class];
        $this->Endereco = TableRegistry::getTableLocator()->get('Endereco', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Endereco);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
