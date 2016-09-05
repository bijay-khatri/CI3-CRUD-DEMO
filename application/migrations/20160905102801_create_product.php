<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_product extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'product_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'product_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'product_description' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                        'product_price' => array(
                                'type' => 'FLOAT',
                        ),
                        'product_category_id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                        ),
                ));
                $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (product_category_id) REFERENCES category(category_id)');
                $this->dbforge->add_key('product_id', TRUE);
                $this->dbforge->create_table('product');
        }

        public function down()
        {
                $this->dbforge->drop_table('product');
        }
}
