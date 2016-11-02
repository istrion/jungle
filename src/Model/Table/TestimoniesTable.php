<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Testimonies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Secteurs
 * @property \Cake\ORM\Association\HasMany $Biens
 *
 * @method \App\Model\Entity\Town get($primaryKey, $options = [])
 * @method \App\Model\Entity\Town newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Town[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Town|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Town patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Town[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Town findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TestimoniesTable extends Table
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

        $this->table('testimonies');
        $this->displayField('testimony');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('testimony', 'create');
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
}
