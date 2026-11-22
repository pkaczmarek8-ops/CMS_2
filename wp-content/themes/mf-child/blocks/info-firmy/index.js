( function () {
	var wp = window.wp || {};
	var blocks = wp.blocks;
	var element = wp.element;
	var blockEditor = wp.blockEditor;
	var components = wp.components;

	if ( ! blocks || ! element || ! blockEditor ) {
		return;
	}

	var el = element.createElement;
	var Fragment = element.Fragment;
	var InspectorControls = blockEditor.InspectorControls;
	var PanelBody = components && components.PanelBody;
	var ToggleControl = components && components.ToggleControl;

	function getServerSideRenderComponent() {
		var ssr = window.wp && window.wp.serverSideRender;
		if ( ! ssr ) {
			return null;
		}
		var candidate = ssr.ServerSideRender || ssr.default || ssr;
		if (
			typeof candidate === 'function' ||
			( typeof candidate === 'object' && candidate !== null && candidate.$$typeof )
		) {
			return candidate;
		}
		return null;
	}

	blocks.registerBlockType( 'mf-child/info-firmy', {
		edit: function ( props ) {
			var blockProps = blockEditor.useBlockProps();
			var ServerSideRender = getServerSideRenderComponent();
			var pokazTelefon = props.attributes && props.attributes.pokazTelefon !== false;

			var preview = ServerSideRender
				? el( ServerSideRender, {
						block: 'mf-child/info-firmy',
						attributes: props.attributes,
				  } )
				: el(
						'div',
						{ style: { padding: '0.5rem 0' } },
						el( 'p', null, el( 'strong', null, 'Bud-Spec Usługi Budowlane' ) ),
						pokazTelefon
							? el( 'p', null, 'Telefon: +48 123 123 123' )
							: null
				  );

			var sidebar =
				InspectorControls && PanelBody && ToggleControl
					? el(
							InspectorControls,
							null,
							el(
								PanelBody,
								{ title: 'Ustawienia bloku', initialOpen: true },
								el( ToggleControl, {
									label: 'Pokaż numer telefonu',
									checked: pokazTelefon,
									onChange: function ( value ) {
										props.setAttributes( { pokazTelefon: value } );
									},
								} )
							)
					  )
					: null;

			return el(
				Fragment,
				null,
				sidebar,
				el( 'div', blockProps, preview )
			);
		},
		save: function () {
			return null;
		},
	} );
} )();