(() => {
	tinymce.PluginManager.add("simple_cookies_button", function(editor, url) {
		// id кнопки simple_cookies_button должен быть везде один и тот же
		editor.addButton("simple_cookies_button", {
			// id кнопки simple_cookies_button
			image:
				window.location.origin +
				"/wp-content/plugins/simple-cookies/assets/images/simple-cookies-editor-btn.svg",
			type: "menubutton",
			title: sc_tinyMCEtranslate.hoverTitle, // всплывающая подсказка при наведении
			menu: [
				// тут начинается первый выпадающий список
				{
					text: "[addsimplecookie]",
					onclick: function() {
						editor.windowManager.open({
							title: sc_tinyMCEtranslate.boxTitle,
							body: [
								{
									type: "textbox", // тип textbox = текстовое поле
									name: "scParameter", // ID, будет использоваться ниже
									label: sc_tinyMCEtranslate.name // лейбл
								},
								{
									type: "textbox", // тип textbox = текстовое поле
									name: "scValue", // ID, будет использоваться ниже
									label: sc_tinyMCEtranslate.value // лейбл
								},
								{
									type: "listbox", // тип listbox = выпадающий список select
									name: "scTime",
									label: sc_tinyMCEtranslate.lifeTime,
									values: [
										// значения выпадающего списка
										{ text: sc_tinyMCEtranslate.minutes, value: "min" }, // лейбл, значение
										{ text: sc_tinyMCEtranslate.hours, value: "h" },
										{ text: sc_tinyMCEtranslate.days, value: "d" },
										{ text: sc_tinyMCEtranslate.weeks, value: "w" },
										{ text: sc_tinyMCEtranslate.months, value: "m" },
										{ text: sc_tinyMCEtranslate.years, value: "y" }
									],
									maxWidth: 90
								},
								{
									type: "textbox", // тип textbox = текстовое поле
									name: "scTimeValue", // ID, будет использоваться ниже
									label: "Количество", // лейбл
									maxWidth: 60
								}
							],
							onsubmit: function(e) {
								// это будет происходить после заполнения полей и нажатии кнопки отправки
								editor.insertContent(
									'[addsimplecookie parameter="' +
										e.data.scParameter +
										'" value="' +
										e.data.scValue +
										'" time="' +
										e.data.scTimeValue +
										" " +
										e.data.scTime +
										'"]'
								);
							}
						});
					}
				},
				{
					text: "[removesimplecookie]",
					onclick: function() {
						editor.windowManager.open({
							title: sc_tinyMCEtranslate.boxTitle,
							body: [
								{
									type: "textbox", // тип textbox = текстовое поле
									name: "scParameter", // ID, будет использоваться ниже
									label: sc_tinyMCEtranslate.name // лейбл
								},
								{
									type: "textbox", // тип textbox = текстовое поле
									name: "scValue", // ID, будет использоваться ниже
									label: sc_tinyMCEtranslate.value // лейбл
								}
							],
							onsubmit: function(e) {
								// это будет происходить после заполнения полей и нажатии кнопки отправки
								editor.insertContent(
									'[removesimplecookie parameter="' +
										e.data.scParameter +
										'" value="' +
										e.data.scValue +
										'"]'
								);
							}
						});
					}
				},
				{
					text: "[showforsimplecookie]",
					onclick: function() {
						editor.windowManager.open({
							title: sc_tinyMCEtranslate.boxTitle,
							body: [
								{
									type: "textbox", // тип textbox = текстовое поле
									name: "scParameter", // ID, будет использоваться ниже
									label: sc_tinyMCEtranslate.name // лейбл
								},
								{
									type: "textbox", // тип textbox = текстовое поле
									name: "scValue", // ID, будет использоваться ниже
									label: sc_tinyMCEtranslate.value // лейбл
								},
								{
									type: "textbox", // тип textbox = текстовое поле
									name: "scContent",
									label: sc_tinyMCEtranslate.showContent,
									value: "",
									multiline: true, // большое текстовое поле - textarea
									minWidth: 300, // минимальная ширина в пикселях
									minHeight: 100 // минимальная высота в пикселях
								}
							],
							onsubmit: function(e) {
								// это будет происходить после заполнения полей и нажатии кнопки отправки
								editor.insertContent(
									'[showforsimplecookie parameter="' +
										e.data.scParameter +
										'" value="' +
										e.data.scValue +
										'"]' +
										e.data.scContent +
										"[/showforsimplecookie]"
								);
							}
						});
					}
				},
				{
					text: "[hideforsimplecookie]",
					onclick: function() {
						editor.windowManager.open({
							title: sc_tinyMCEtranslate.boxTitle,
							body: [
								{
									type: "textbox", // тип textbox = текстовое поле
									name: "scParameter", // ID, будет использоваться ниже
									label: sc_tinyMCEtranslate.name // лейбл
								},
								{
									type: "textbox", // тип textbox = текстовое поле
									name: "scValue", // ID, будет использоваться ниже
									label: sc_tinyMCEtranslate.value // лейбл
								},
								{
									type: "textbox", // тип textbox = текстовое поле
									name: "scContent",
									label: sc_tinyMCEtranslate.hideContent,
									value: "",
									multiline: true, // большое текстовое поле - textarea
									minWidth: 300, // минимальная ширина в пикселях
									minHeight: 100 // минимальная высота в пикселях
								}
							],
							onsubmit: function(e) {
								// это будет происходить после заполнения полей и нажатии кнопки отправки
								editor.insertContent(
									'[hideforsimplecookie parameter="' +
										e.data.scParameter +
										'" value="' +
										e.data.scValue +
										'"]' +
										e.data.scContent +
										"[/hideforsimplecookie]"
								);
							}
						});
					}
				}
			]
		});
	});
})();
