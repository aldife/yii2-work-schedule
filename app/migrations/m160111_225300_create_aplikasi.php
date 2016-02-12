<?php

use yii\db\Schema;
use yii\db\Migration;

class m160111_225300_create_aplikasi extends Migration
{
    public function up()
    {
$this->createTable('bimbel', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(100)->notNull(),
            'logo' => $this->string(),
            'foto_gedung' => $this->string(),
            'email' => $this->string(100)->notNull(),
            'phone' => $this->string(20)->notNull(),
            'provinsi' => $this->string(50)->notNull(),
            'kota' => $this->string(50)->notNull(),
            'alamat' => $this->text(),
            'kode_pos' => $this->string(10),
            'keterangan' => $this->text(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'modified_at' => $this->integer(),
            'ip' => $this->string(),
            'browser' => $this->text()
        ]);
        
        $this->createTable('bimbel_pelajaran', [
            'id' => $this->primaryKey(),
            'id_jurusan' => $this->integer()->notNull(),
            'id_bimbel' => $this->integer()->notNull(), 
            'nama_pelajaran' => $this->string()->notNull(),
            'keterangan' => $this->text(), 
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'modified_at' => $this->integer(),
            'ip' => $this->string(),
            'browser' => $this->text()
        ]);
        
        $this->createTable('bimbel_jurusan', [
            'id' => $this->primaryKey(), 
            'id_bimbel' => $this->integer()->notNull(),
            'nama_jurusan' => $this->string()->notNull(),
            'keterangan' => $this->text(), 
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'modified_at' => $this->integer(),
            'ip' => $this->string(),
            'browser' => $this->text()
        ]);
        
        $this->addForeignKey('fk-jurusan-pelajaran', 'bimbel_pelajaran', 'id_jurusan', 'bimbel_jurusan', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-bimbel-jurusan', 'bimbel_jurusan', 'id_bimbel', 'bimbel', 'id', 'CASCADE', 'RESTRICT');
    
        
        $this->createTable('billing_murid_saldo', [
            'id'            => $this->primaryKey(), 
            'id_bimbel'     => $this->integer()->notNull(),
            'id_orang_tua'     => $this->integer()->notNull(),
            'jumlah'        => $this->integer(),
            'created_at'    => $this->integer(),
            'modified_at'   => $this->integer(),
        ]);
        
        $this->createTable('billing_murid_konfirmasi', [
            'id'                => $this->primaryKey(), 
            'id_bimbel'         => $this->integer()->notNull(),
            'id_orang_tua'     => $this->integer()->notNull(),
            'id_tagihan'        => $this->integer()->notNull(),
            'dari_rek'          => $this->string(50),
            'dari_atas_nama'    => $this->string(100),
            'ke_rek'            => $this->string(50),
            'ke_atas_nama'      => $this->string(100),
            'jumlah'            => $this->integer(),
            'tgl_pembayaran'    => $this->integer(),
            'metode_pembayaran' => $this->string(50),
            'kode_tunai'        => $this->string(10),
            'untuk_pembayaran'  => $this->string(50), 
            'keterangan'        => $this->text(), 
            'status'            => $this->smallInteger(),
            'created_at'        => $this->integer(),
            'modified_at'       => $this->integer(),
            'ip'                => $this->string(),
            'browser'           => $this->text()
        ]);
        
        $this->createTable('billing_murid_tagihan', [
            'id'        => $this->primaryKey(), 
            'id_bimbel' => $this->integer()->notNull(),
            'id_orang_tua'     => $this->integer()->notNull(),
            'jumlah'        => $this->integer(),
            'keterangan'    => $this->text(), 
            'status'        => $this->smallInteger(),
            'created_at'    => $this->integer(),
            'modified_at'   => $this->integer(),
            'ip'            => $this->string(),
            'browser'       => $this->text()
        ]);
        
        
        
        $this->createTable('billing_bimbel_saldo', [
            'id'            => $this->primaryKey(), 
            'id_bimbel'     => $this->integer()->notNull(),
            'jumlah'        => $this->integer(),
            'created_at'    => $this->integer(),
            'modified_at'   => $this->integer(),
        ]);
        
        $this->createTable('billing_bimbel_konfirmasi', [
            'id'                => $this->primaryKey(), 
            'id_bimbel'         => $this->integer()->notNull(),
            'id_tagihan'        => $this->integer()->notNull(),
            'dari_rek'          => $this->string(50),
            'dari_atas_nama'    => $this->string(100),
            'ke_rek'            => $this->string(50),
            'ke_atas_nama'      => $this->string(100),
            'jumlah'            => $this->integer(),
            'tgl_pembayaran'    => $this->integer(),
            'metode_pembayaran' => $this->string(50),
            'kode_tunai'        => $this->string(10),
            'untuk_pembayaran'  => $this->string(50), 
            'keterangan'        => $this->text(), 
            'status'            => $this->smallInteger(),
            'created_at'        => $this->integer(),
            'modified_at'       => $this->integer(),
            'ip'                => $this->string(),
            'browser'           => $this->text()
        ]);
        
        $this->createTable('billing_bimbel_tagihan', [
            'id'        => $this->primaryKey(), 
            'id_bimbel' => $this->integer()->notNull(),
            'jumlah'        => $this->integer(),
            'keterangan'    => $this->text(), 
            'status'        => $this->smallInteger(),
            'created_at'    => $this->integer(),
            'modified_at'   => $this->integer(),
            'ip'            => $this->string(),
            'browser'       => $this->text()
        ]);
        
    }

    public function down()
    {
        echo "m160111_225300_create_aplikasi cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
