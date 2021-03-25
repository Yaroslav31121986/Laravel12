$(document).ready(function () {

    var button_add = document.querySelector( '.js-add' );
    button_add.addEventListener( "click", function () {
        var block = document.querySelector( '.params' );
        var element = document.querySelector( '.param' ).cloneNode( true );
        block.appendChild( element );
    });

    var button_remove = document.querySelector( '.js-remove' );
    button_remove.addEventListener( "click", function () {
        var block = document.querySelector( '.params' );

        if (block.childElementCount > 1) {
            block.lastChild.remove();
        }
    });

    var button_add_material = document.getElementById( 'material_add' );
    button_add_material.addEventListener( "click", function () {
        var block_materials = document.querySelector( '.materials' );
        var element_material = document.querySelector( '.material' ).cloneNode( true );
        block_materials.appendChild( element_material );
    });

    var button_remove_material = document.getElementById( 'material_remove' );
    button_remove_material.addEventListener( "click", function () {
        var block_materials = document.querySelector( '.materials' );
        if (block_materials.childElementCount > 1) {
            block_materials.lastChild.remove();
        }
    });

    var button_add_process = document.getElementById( 'process_add' );
    button_add_process.addEventListener( "click", function () {
        var block_processes = document.querySelector( '.processes' );
        var element_process = document.querySelector( '.process' ).cloneNode( true );
        block_processes.appendChild( element_process );
    });

    var button_remove_process = document.getElementById( 'process_remove' );
    button_remove_process.addEventListener( "click", function () {
        var block_processes = document.querySelector( '.processes' );
        if (block_processes.childElementCount > 1) {
            block_processes.lastChild.remove();
        }
    });

});
