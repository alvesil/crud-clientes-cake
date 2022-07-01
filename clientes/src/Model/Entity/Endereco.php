<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Endereco Entity
 *
 * @property int $id
 * @property int $fk_id_cliente
 * @property string $endereco
 * @property string|resource $numero
 * @property string $complemento
 * @property string $bairro
 * @property string $cep
 * @property int $fk_id_uf
 * @property int $fk_id_cidade
 * @property \Cake\I18n\FrozenDate $dt_cadastro
 */
class Endereco extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'fk_id_cliente' => true,
        'endereco' => true,
        'numero' => true,
        'complemento' => true,
        'bairro' => true,
        'cep' => true,
        'fk_id_uf' => true,
        'fk_id_cidade' => true,
        'dt_cadastro' => true,
    ];
}
