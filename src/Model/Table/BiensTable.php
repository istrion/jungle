<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;


/**
 * Biens Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Secteurs
 * @property \Cake\ORM\Association\BelongsTo $Villes
 * @property \Cake\ORM\Association\BelongsTo $Dpes
 * @property \Cake\ORM\Association\BelongsTo $Agents
 *
 * @method \App\Model\Entity\Bien get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bien newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bien[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bien|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bien patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bien[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bien findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BiensTable extends Table
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

        $this->table('biens');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Secteurs', [
            'foreignKey' => 'secteur_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Towns', [
            'foreignKey' => 'town_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Dpes', [
            'foreignKey' => 'dpe_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Agents', [
            'foreignKey' => 'agent_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ImagesBiens', [
            'foreignKey' => 'id',
            'joinType' => 'INNER'
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

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->integer('room')
            ->requirePresence('room', 'create')
            ->notEmpty('room');

        $validator
            ->integer('kitchen')
            ->requirePresence('kitchen', 'create')
            ->notEmpty('kitchen');

        $validator
            ->integer('shower')
            ->requirePresence('shower', 'create')
            ->notEmpty('shower');

        $validator
            ->integer('parking')
            ->requirePresence('parking', 'create')
            ->notEmpty('parking');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['secteur_id'], 'Secteurs'));
        //$rules->add($rules->existsIn(['town_id'], 'Towns'));
        $rules->add($rules->existsIn(['dpe_id'], 'Dpes'));
        //$rules->add($rules->existsIn(['agent_id'], 'Agents'));

        return $rules;
    }

    public function getLastBiens() {
        $imagesBiens = TableRegistry::get('ImagesBiens');
        $biens = TableRegistry::get('Biens');
        $queryBiens = $biens->find('all', [
            'order' => ['Biens.created' => 'DESC']
        ])->limit(15);

        $biens = [];

        foreach ($queryBiens as $bien) {
            $bien->images = [];

            $images = $imagesBiens->find('all')
                ->where(["ImagesBiens.bien_id" => $bien->id])
                ->contain('Images');

            foreach ($images as $img) {
                array_push($bien->images, $img->image);
            }

            array_push($biens, $bien);
        }
        return $biens;
    }

    public function getRecentSales()
    {
        $imagesBiens = TableRegistry::get('ImagesBiens');

        $queryBiens = $this->find('all', [
            'order' => ['Biens.modified' => 'DESC']
        ])
        ->where(['sold' => 1])
        ->limit(15);

        $biens = [];

        foreach ($queryBiens as $bien) {
            $bien->images = [];

            $images = $imagesBiens->find('all')
                ->where(["ImagesBiens.bien_id" => $bien->id])
                ->contain('Images');

            foreach ($images as $img) {
                array_push($bien->images, $img->image);
            }

            array_push($biens, $bien);
        }

        return $biens;
    }
}
