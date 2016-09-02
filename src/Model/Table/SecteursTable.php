<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Secteurs Model
 *
 * @property \Cake\ORM\Association\HasMany $Biens
 * @property \Cake\ORM\Association\HasMany $Towns
 *
 * @method \App\Model\Entity\Secteur get($primaryKey, $options = [])
 * @method \App\Model\Entity\Secteur newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Secteur[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Secteur|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Secteur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Secteur[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Secteur findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SecteursTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('secteurs');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Biens', [
            'foreignKey' => 'secteur_id'
        ]);
        $this->hasMany('Towns', [
            'foreignKey' => 'secteur_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        return $validator;
    }
}
