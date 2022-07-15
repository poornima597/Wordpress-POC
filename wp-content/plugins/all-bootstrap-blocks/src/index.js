import './index.scss';
import './style.scss';

import '../blocks/strip/block.js';
import '../blocks/container/block.js';
import '../blocks/row/block.js';
import '../blocks/column/block.js';
import '../blocks/column-break/block.js';

import '../blocks/accordion/block.js';
import '../blocks/accordion-item/block.js';
import '../blocks/alert/block.js';
import '../blocks/breadcrumb/block.js';
import '../blocks/button/block.js';
import '../blocks/button-group/block.js';
import '../blocks/card/block.js';
import '../blocks/card-body/block.js';
import '../blocks/card-header/block.js';
import '../blocks/card-footer/block.js';
import '../blocks/card-group/block.js';
import '../blocks/carousel/block.js';
import '../blocks/carousel-item/block.js';
import '../blocks/collapse/block.js';
import '../blocks/div/block.js';
import '../blocks/dropdown-item/block.js';
import '../blocks/list-group/block.js';
import '../blocks/list-group-item/block.js';
import '../blocks/modal/block.js';
import '../blocks/modal-header/block.js';
import '../blocks/modal-body/block.js';
import '../blocks/modal-footer/block.js';
import '../blocks/nav-and-tab/block.js';
import '../blocks/nav-and-tab-item/block.js';
import '../blocks/offcanvas/block.js';
import '../blocks/offcanvas-header/block.js';
import '../blocks/offcanvas-body/block.js';
import '../blocks/progress/block.js';
import '../blocks/spinner/block.js';
import '../blocks/toast/block.js';
import '../blocks/toast-header/block.js';
import '../blocks/toast-body/block.js';
import '../blocks/icon/block.js';

import '../blocks/banner/block.js';
import '../blocks/banner-item/block.js';
import '../blocks/content-with-media/block.js';
import '../blocks/content-grid/block.js';
import '../blocks/content-grid-item/block.js';
import '../blocks/post-grid/block.js';
import '../blocks/media-grid/index.js';
import '../blocks/media-grid-image/index.js';

wp.domReady( () => {
	if ( areoi_vars.hide_buttons ) {
		wp.blocks.unregisterBlockType( 'core/buttons' );
		wp.blocks.unregisterBlockType( 'core/button' );
	}
	if ( areoi_vars.hide_columns ) {
		wp.blocks.unregisterBlockType( 'core/columns' );
		wp.blocks.unregisterBlockType( 'core/column' );
	}	
} );