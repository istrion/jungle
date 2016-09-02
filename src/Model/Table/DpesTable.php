<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dpes Model
 *
 * @property \Cake\ORM\Association\HasMany $Biens
 *
 * @method \App\Model\Entity\Dpe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dpe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dpe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dpe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dpe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dpe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dpe findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DpesTable extends Table
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

        $this->table('dpes');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Biens', [
            'foreignKey' => 'dpe_id'
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
