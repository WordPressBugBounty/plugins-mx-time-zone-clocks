import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
import { Panel, PanelBody, PanelRow, SelectControl, TextControl, ColorPicker, Button } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEffect, useState, useRef } from '@wordpress/element';
import './editor.scss';
import metadata from './block.json';
import timezones from 'timezones-list';
import ISO6391 from 'iso-639-1';
import { locales } from './locales'
import { v4 as uuidv4 } from 'uuid';

export default function Edit({ attributes, setAttributes }) {

	const blockProps = useBlockProps();

	// Ref to the ServerSideRender wrapper so we can initialize the clock
	// inside its own document (the editor renders inside an iframe on apiVersion 3).
	const clockWrapRef = useRef();

	// time zones
	const formattedTimezones = [];

	const _timezones = timezones.sort((a, b) => {
		if ( a.label < b.label ){
			return -1;
		  }
		  if ( a.label > b.label ){
			return 1;
		  }
		  return 0;
	}); 
	
	_timezones.forEach(element => {
		let obj = {
			label: element.label,
			value: element.tzCode
		}
		formattedTimezones.push(obj);
	});

	// locales
	const formattedLocales = [];

	const _ISO6391 = ISO6391.getLanguages(ISO6391.getAllCodes());

	let languages = _ISO6391.sort((a, b) => {
		if ( a.nativeName < b.nativeName ){
			return -1;
		  }
		  if ( a.nativeName > b.nativeName ){
			return 1;
		  }
		  return 0;
	});
	
	languages.forEach(element => {

		if(element.code !== 'ru' && element.code !== 'be') {
			let obj = {
				label: element.nativeName,
				value: element.code
			}
			formattedLocales.push(obj);
		}		
	});

	// font sizes
	let formattedFontSizes = []

	for(let size=0; size<=100; size++) {
		let obj = {
			label: size,
			value: size
		}
		formattedFontSizes.push(obj);
	}

	// image names
	let imageNames = [];
	for(let key=1; key<=30; key++) {
		const img = `clock-face${key}.png`;
		imageNames.push(img);
	}

	// image upload
	const ALLOWED_MEDIA_TYPES = ['image']

	const imageData = useSelect((select) => {
		if (attributes.mediaId) {
			return select('core').getEntityRecord('postType', 'attachment', attributes.mediaId);

		} else {
			return false
		}
	}, [attributes]);

	useEffect(() => {
		if (imageData?.media_details) {

			let image_url = 'false'

			if( imageData?.media_details?.sizes?.full?.source_url ) {

				image_url = imageData.media_details.sizes.full.source_url;
			} else {

				if(imageData?.source_url) {

					image_url = imageData.source_url
				}
			}

			setAttributes({
				clock_upload: image_url
			})
		}
	}, [imageData]);

	// generate id
	useEffect(() => {
		setAttributes({
			clock_id: 'mx-'+uuidv4()
		});
	}, []);

	useEffect(() => {

		const timer = setTimeout(() => {

			const node = clockWrapRef.current;

			if (!node) {
				return;
			}

			// The clock markup lives in the block's own document. In the editor
			// that is the iframe document, so resolve jQuery/mxmtzcRunClocks from
			// the element's window rather than the parent editor window.
			const frameWindow = node.ownerDocument.defaultView;
			const runner = frameWindow.mxmtzcRunClocks;
			const jq = frameWindow.jQuery;

			if (typeof runner === 'object' && typeof jq === 'function') {

				runner.initClock(jq(node).find('.mx-clock-live-el'));
			}
		}, 2000);

		return () => clearTimeout(timer);
	}, [attributes]);

	return [
		<InspectorControls key="mx-settings">

			<Panel header="Clock Properties">
				
				<PanelBody title={__('Time Zone', 'mx-time-zone-clock')} initialOpen={true}>
					
					<PanelRow>
						<SelectControl
							onChange={(time_zone) => setAttributes({ time_zone })}
							__next40pxDefaultSize
							__nextHasNoMarginBottom
							value={attributes.time_zone}
							options={formattedTimezones}
						/>
					</PanelRow>

				</PanelBody>

				<PanelBody title={__('City Name', 'mx-time-zone-clock')} initialOpen={true}>
					
					<PanelRow>
						<TextControl
							__next40pxDefaultSize
							value={attributes.city_name}
							onChange={(city_name) => setAttributes({ city_name })}
						/>
					</PanelRow>

				</PanelBody>

				<PanelBody title={__('Time Format', 'mx-time-zone-clock')} initialOpen={false}>
					
					<PanelRow>
						<SelectControl
							onChange={(time_format) => setAttributes({ time_format })}
							__next40pxDefaultSize
							__nextHasNoMarginBottom
							value={attributes.time_format}
							options={[
								{
									label: 24,
									value: 24
								},
								{
									label: 12,
									value: 12
								}
							]}
						/>
					</PanelRow>

				</PanelBody>

				<PanelBody title={__('Digital Clock', 'mx-time-zone-clock')} initialOpen={false}>
					
					<PanelRow>
						<SelectControl
							onChange={(digital_clock) => setAttributes({ digital_clock })}
							__next40pxDefaultSize
							__nextHasNoMarginBottom
							value={attributes.digital_clock}
							options={[
								{
									label: __('Yes', 'mx-time-zone-clock'),
									value: 'true'
								},
								{
									label: __('No', 'mx-time-zone-clock'),
									value: 'false'
								}
							]}
						/>
					</PanelRow>

				</PanelBody>

				<PanelBody title={__('Show Date', 'mx-time-zone-clock')} initialOpen={false}>
					
					<PanelRow>
						<SelectControl
							onChange={(show_days) => setAttributes({ show_days })}
							__next40pxDefaultSize
							__nextHasNoMarginBottom
							value={attributes.show_days}
							options={[
								{
									label: 'Yes',
									value: 'true'
								},
								{
									label: 'No',
									value: 'false'
								}
							]}
						/>
					</PanelRow>

				</PanelBody>

				{ attributes.show_days === 'true' ? <PanelBody title={__('Date Language', 'mx-time-zone-clock')} initialOpen={false}>
					
					<PanelRow>
						<SelectControl
							onChange={(lang_for_date) => setAttributes({ lang_for_date })}
							__next40pxDefaultSize
							__nextHasNoMarginBottom
							value={attributes.lang_for_date}
							options={formattedLocales}
						/>
					</PanelRow>

					<PanelRow>
						<small>{__('* Not all the languages are supported by the clock.', 'mx-time-zone-clock')}</small>
					</PanelRow>				

				</PanelBody> : '' }				

				<PanelBody title={__('Clock Font Size', 'mx-time-zone-clock')} initialOpen={false}>
					
					<PanelRow>
						<SelectControl
							onChange={(clock_font_size) => setAttributes({ clock_font_size })}
							__next40pxDefaultSize
							__nextHasNoMarginBottom
							value={attributes.clock_font_size}
							options={formattedFontSizes}
						/>
					</PanelRow>

				</PanelBody>

				<PanelBody title={__('Text Align', 'mx-time-zone-clock')} initialOpen={false}>
					
					<PanelRow>
						<SelectControl
							onChange={(text_align) => setAttributes({ text_align })}
							__next40pxDefaultSize
							__nextHasNoMarginBottom
							value={attributes.text_align}
							options={[
								{
									label: 'Left',
									value: 'left'
								},
								{
									label: 'Center',
									value: 'center'
								},
								{
									label: 'Right',
									value: 'right'
								}
							]}
						/>
					</PanelRow>

				</PanelBody>

				<PanelBody title={__('Show Seconds', 'mx-time-zone-clock')} initialOpen={false}>
					
					<PanelRow>
						<SelectControl
							onChange={(show_seconds) => setAttributes({ show_seconds })}
							__next40pxDefaultSize
							__nextHasNoMarginBottom
							value={attributes.show_seconds}
							options={[
								{
									label: 'Yes',
									value: 'true'
								},
								{
									label: 'No',
									value: 'false'
								}
							]}
						/>
					</PanelRow>

				</PanelBody>

				<PanelBody title={__('Super Simple', 'mx-time-zone-clock')} initialOpen={false}>
					
					<PanelRow>
						<SelectControl
							onChange={(super_simple) => setAttributes({ super_simple })}
							__next40pxDefaultSize
							__nextHasNoMarginBottom
							value={attributes.super_simple}
							options={[
								{
									label: 'Yes',
									value: 'true'
								},
								{
									label: 'No',
									value: 'false'
								}
							]}
						/>
					</PanelRow>

				</PanelBody>

				{ attributes.super_simple === 'false' && attributes.digital_clock == 'false' ? <PanelBody title={__('Arrow Type', 'mx-time-zone-clock')} initialOpen={false}>
					
					<PanelRow>
						<SelectControl
							onChange={(arrow_type) => setAttributes({ arrow_type })}
							__next40pxDefaultSize
							__nextHasNoMarginBottom
							value={attributes.arrow_type}
							options={[
								{
									label: 'Classical',
									value: 'classical'
								},
								{
									label: 'Modern',
									value: 'modern'
								}
							]}
						/>
					</PanelRow>

				</PanelBody> : '' }

				{ attributes.super_simple === 'false' && attributes.digital_clock == 'false' ? <PanelBody title={__('Arrows Color', 'mx-time-zone-clock')} initialOpen={false}>
					
					<PanelRow>
						
						<ColorPicker 
							onChange={(arrows_color) => setAttributes({ arrows_color })}
							defaultValue={attributes.arrows_color}
						/>

					</PanelRow>

				</PanelBody> : '' }

				{typeof mxdfmtzc_localizer === 'object' && mxdfmtzc_localizer.hasOwnProperty('image_folder') && attributes.super_simple === 'false' && attributes.digital_clock == 'false' ? (
					<PanelBody title={__('Clock Type', 'mx-time-zone-clock')} initialOpen={false}>
						
						<PanelRow>
							
							<div className="mx-time-zone-clock-types">
								{imageNames.map((image, index) => {
									return (<div key={index}>
										<label htmlFor={'mx-time-zone-clock-type'+index}>
											<img src={mxdfmtzc_localizer.image_folder + image} />
											<input 
												type="radio" 
												name="mx-time-zone-clock-type"
												id={'mx-time-zone-clock-type'+index}
												value={image}
												onChange={e => {
													setAttributes({ 
														clock_type: e.currentTarget.value,
														clock_upload: 'false',
														mediaId: null
													})
												}}
												checked={image===attributes.clock_type}
											/>
										</label>
										
									</div>)
								})}
							</div>

						</PanelRow>

					</PanelBody>
					
				) : ''}

				{
					attributes.super_simple === 'false' && attributes.digital_clock == 'false' ? <PanelBody title={__('Upload Clock', 'mx-time-zone-clock')} initialOpen={false}>
					
						<PanelRow>

							<div className="mx-time-zone-clock-upload-image">

								<MediaUploadCheck>
									<MediaUpload
										onSelect={(media) => setAttributes({
											mediaId: media.id
										})}
										allowedTypes={ALLOWED_MEDIA_TYPES}
										value={attributes.mediaId}
										render={({ open }) => (
											<Button
												icon="upload"
												text={attributes.mediaId ? 'Change Image' : 'Upload Image'}
												variant="secondary"
												onClick={open}
											/>
										)}
									/>
								</MediaUploadCheck>

								<div>
									{attributes?.clock_upload && attributes?.clock_upload !== 'false' ? (

										<div className="mx-time-zone-clock-uploaded-image">

											<img src={attributes.clock_upload} id={attributes.mediaId} />

											<Button
												icon="remove"
												variant="secondary"
												isDestructive="true"
												onClick={() => {
													setAttributes({
														clock_upload: 'false',
														mediaId: null
													})
												}}
											/>
											
										</div>

									) : (
									<>
										<h3>No image!</h3>
										<small>{__('* The best size is 120x120px. The best format is .png', 'mx-time-zone-clock')}</small>
									</>)}	
								</div>

							</div>
							
						</PanelRow>

					</PanelBody> : ''
				}

			</Panel>

		</InspectorControls>,
		<div
			key="mx-render"
			{...blockProps}
		>
			<div ref={clockWrapRef}>
				<ServerSideRender
					block={metadata.name}
					attributes={attributes}
				></ServerSideRender>
			</div>
		</div>
	];
}
