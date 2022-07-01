<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property \Cake\I18n\FrozenDate $dt_nascimento
 * @property string $sexo
 * @property string|null $observacao
 * @property int $fk_id_uf
 * @property int $fk_id_cidade
 * @property \Cake\I18n\FrozenDate $dt_cadastro
 */
class Cliente extends Entity
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
        'nome' => true,
        'cpf' => true,
        'dt_nascimento' => true,
        'sexo' => true,
        'observacao' => true,
        'fk_id_uf' => true,
        'fk_id_cidade' => true,
        'dt_cadastro' => true,
    ];
}
