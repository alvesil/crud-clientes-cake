<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EnderecoFixture
 */
class EnderecoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'endereco';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fk_id_cliente' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'endereco' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'numero' => ['type' => 'binary', 'length' => 15, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null],
        'complemento' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'bairro' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cep' => ['type' => 'string', 'length' => 8, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fk_id_uf' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fk_id_cidade' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'dt_cadastro' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_endereco_cidade' => ['type' => 'index', 'columns' => ['fk_id_cidade'], 'length' => []],
            'fk_endereco_cliente' => ['type' => 'index', 'columns' => ['fk_id_cliente'], 'length' => []],
            'fk_endereco_uf' => ['type' => 'index', 'columns' => ['fk_id_uf'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'fk_id_cliente' => 1,
                'endereco' => 'Lorem ipsum dolor sit amet',
                'numero' => 'Lorem ipsum d',
                'complemento' => 'Lorem ipsum dolor sit amet',
                'bairro' => 'Lorem ipsum dolor sit amet',
                'cep' => 'Lorem ',
                'fk_id_uf' => 1,
                'fk_id_cidade' => 1,
                'dt_cadastro' => '2022-07-01',
            ],
        ];
        parent::init();
    }
}
