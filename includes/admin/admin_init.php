<?php

include 'metabox_rt_receita_opcoes.php';
include 'enqueue.php';

function rt_receitas_admin_init() {
    add_action('add_meta_boxes_receita', 'rt_receitas_metaboxes');
    add_action('admin_enqueue_scripts', 'rt_admin_enqueue');
}

function rt_receitas_metaboxes() {

    add_meta_box(
        'rt_receitas_opcoes', 
        __('Opções da receita', 'receitas'),
        'rt_receita_opcoes',
        'receita',
        'normal',
        'high'
    );

}

function rt_save_post_admin($post_id, $post, $update) {

    if(!$update) {
        return;
    }

    $receita_data = array(
        'ingredientes' => $_POST['rt_ingredientes'],
        'tempo' => $_POST['rt_tempo'],
        'utensilios' => $_POST['rt_utensilios'],
        'dificuldade' => $_POST['rt_dificuldade'],
        'tipo' => $_POST['rt_tipo']
    );

    update_post_meta($post_id, 'receita_data', $receita_data);

}