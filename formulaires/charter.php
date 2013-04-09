<div class="ajax formulaire_spip formulaire_configurer formulaire_#FORM formulaire_#FORM-#ENV{id,nouveau}">
	<h3 class="titrem">Titre du formulaire</h3>
	[<p class="reponse_formulaire reponse_formulaire_ok">(#ENV**{message_ok})</p>]
	[<p class="reponse_formulaire reponse_formulaire_erreur">(#ENV**{message_erreur})</p>]
	<h4>Des fois on utilise un sous-titre (Étape 1/N)</h4>
	<p>Un texte d'introduction, qui peut parfois être sur plusieurs lignes.
		Un texte d'introduction, qui peut parfois être sur plusieurs lignes.
		Un texte d'introduction, qui peut parfois être sur plusieurs lignes.
		Un texte d'introduction, qui peut parfois être sur plusieurs lignes.
	</p>
	<ul class="spip">
		<li>avec une énumération</li>
		<li>de plusieurs items</li>
		<li>qui doivent «bien tomber»</li>
	</ul>
	[(#ENV{editable})
	<form method='post' action='#ENV{action}'><div>
		[(#REM) déclarer les hidden qui déclencheront le service du formulaire
		paramêtre : url d'action ]
		#ACTION_FORMULAIRE{#ENV{action}}
		#SET{fl,charter}
		<p class="explication">Des explications préliminaires, en début de formulaire</p>
		<fieldset>
			<legend><:charter:legend:></legend>
				<p class="explication">Des explications dans un fieldset</p>
				<ul>
				<!--EX01-->
				#SET{name,text}#SET{obli,''}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label for="#GET{name}">[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]<input type="text" name="#GET{name}" class="text" value="#ENV*{#GET{name},#GET{defaut}}" id="#GET{name}" [(#HTML5|et{#GET{obli}})required='required']/>
				</li>
				<!--EX02-->
				#SET{name,select}#SET{obli,''}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label for="#GET{name}">[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]<select name="#GET{name}" class="select" id="#GET{name}">
						#SET{val,oui}
						<option value="#GET{val}"[(#ENV{#GET{name},#GET{defaut}}|=={#GET{val}}|oui)selected="selected"]>[(#GET{fl}|concat{':label_',#GET{name},'_',#GET{val}}|_T)]</option>
						#SET{val,non}
						<option value="#GET{val}"[(#ENV{#GET{name},#GET{defaut}}|=={#GET{val}}|oui)selected="selected"]>[(#GET{fl}|concat{':label_',#GET{name},'_',#GET{val}}|_T)]</option>
					</select>
				</li>
				<!--EX03-->
				#SET{name,text_obli}#SET{obli,'obligatoire'}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label for="#GET{name}">[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]<input type="text" name="#GET{name}" class="text" value="#ENV*{#GET{name},#GET{defaut}}" id="#GET{name}" [(#HTML5|et{#GET{obli}})required='required']/>
				</li>
			</ul>
		</fieldset>
		<fieldset>
			<legend><:charter:legend:></legend>
			<ul>
				<!--EX04-->
				#SET{name,text}#SET{obli,''}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label for="#GET{name}">[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]
					<p class="explication">Des explications au dessus d'un champ de saisie</p>
					<input type="text" name="#GET{name}" class="text" value="#ENV*{#GET{name},#GET{defaut}}" id="#GET{name}" [(#HTML5|et{#GET{obli}})required='required']/>
				</li>
				<!--EX05-->
				#SET{name,text_obli}#SET{obli,'obligatoire'}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label for="#GET{name}">[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]<input type="text" name="#GET{name}" class="text" value="#ENV*{#GET{name},#GET{defaut}}" id="#GET{name}" [(#HTML5|et{#GET{obli}})required='required']/>
					<p class="explication">Des explications après un champ de saisie</p>
				</li>
				<!--EX06-->
				#SET{name,textarea}#SET{obli,''}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label for="#GET{name}">[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]<textarea name="#GET{name}" class="textarea">
#ENV*{#GET{name},#GET{defaut}}</textarea>
				</li>
				<!--EX07-->
				#SET{name,textarea_pleine_largeur}#SET{obli,''}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer pleine_largeur editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label for="#GET{name}">[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]<textarea name="#GET{name}" class="textarea">
#ENV*{#GET{name},#GET{defaut}}</textarea>
				</li>
				#SET{name,textarea_pleine_largeur_obli}#SET{obli,'obligatoire'}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer pleine_largeur editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label for="#GET{name}">[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]<textarea name="#GET{name}" class="textarea">
#ENV*{#GET{name},#GET{defaut}}</textarea>
				</li>
				<!--EX08-->
				#SET{name,text_long_label}#SET{obli,''}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer long_label editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label for="#GET{name}">[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]<input type="text" name="#GET{name}" class="text" value="#ENV*{#GET{name},#GET{defaut}}" id="#GET{name}" [(#HTML5|et{#GET{obli}})required='required']/>
				</li>
				<!--EX09-->
				#SET{name,radio}#SET{obli,''}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label>[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]
					<p class="explication">Des explications au-dessus d'un choix</p>
					#SET{val,oui}
					<div class="choix">
						<input type="radio" name="#GET{name}" class="radio" id="#GET{name}_#GET{val}" value="#GET{val}"[(#ENV{#GET{name},#GET{defaut}}|=={#GET{val}}|oui)checked="checked"] />
						<label for="#GET{name}_#GET{val}">[(#GET{fl}|concat{':label_',#GET{name},'_',#GET{val}}|_T)]</label>
					</div>
					#SET{val,non}
					<div class="choix">
						<input type="radio" name="#GET{name}" class="radio" id="#GET{name}_#GET{val}" value="#GET{val}"[(#ENV{#GET{name},#GET{defaut}}|=={#GET{val}}|oui)checked="checked"] />
						<label for="#GET{name}_#GET{val}">[(#GET{fl}|concat{':label_',#GET{name},'_',#GET{val}}|_T)]</label>
					</div>
				</li>
				<!--EX10-->
				#SET{name,checkbox}#SET{obli,''}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label>[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]
					#SET{val,1}
					<div class="choix">
						<input type="checkbox" name="#GET{name}#EVAL{chr(91)}#EVAL{chr(93)}" class="checkbox" id="#GET{name}_#GET{val}" value="#GET{val}"[(#GET{val}|in_any{#ENV{#GET{name},#GET{defaut}}}|oui)checked="checked"] />
						<label for="#GET{name}_#GET{val}">[(#GET{fl}|concat{':label_',#GET{name},'_',#GET{val}}|_T)]</label>
					</div>
					#SET{val,2}
					<div class="choix">
						<input type="checkbox" name="#GET{name}#EVAL{chr(91)}#EVAL{chr(93)}" class="checkbox" id="#GET{name}_#GET{val}" value="#GET{val}"[(#GET{val}|in_any{#ENV{#GET{name},#GET{defaut}}}|oui)checked="checked"] />
						<label for="#GET{name}_#GET{val}">[(#GET{fl}|concat{':label_',#GET{name},'_',#GET{val}}|_T)]</label>
					</div>
				</li>
                <!--EX10b-->
                #SET{name,checkbox_ouinon}#SET{obli,''}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
                <li class="editer editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
                    <label>[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
                    <span class='erreur_message'>(#GET{erreurs})</span>
                    ]
                    #SET{val_non,0}
                    #SET{val,1}
                    <div class="choix">[
                        (#REM) Valeur envoyee si case non cochee]
                        <input type="hidden" name="#GET{name}" value="#GET{val_non}" />
                        <input type="checkbox" name="#GET{name}" class="checkbox" id="#GET{name}_#GET{val}" value="#GET{val}"[(#GET{val}|=={#ENV{#GET{name},#GET{defaut}}}|oui)checked="checked"] />
                        <label for="#GET{name}_#GET{val}">[(#GET{fl}|concat{':label_',#GET{name},'_',#GET{val}}|_T)]</label>
                    </div>
                </li>

				<!--EX11-->
				#SET{name,checkbox_long_label}#SET{obli,''}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer long_label editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label>[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]
					#SET{val,1}
					<div class="choix">
						<input type="checkbox" name="#GET{name}#EVAL{chr(91)}#EVAL{chr(93)}" class="checkbox" id="#GET{name}_#GET{val}" value="#GET{val}"[(#GET{val}|in_any{#ENV{#GET{name},#GET{defaut}}}|oui)checked="checked"] />
						<label for="#GET{name}_#GET{val}">[(#GET{fl}|concat{':label_',#GET{name},'_',#GET{val}}|_T)]</label>
					</div>
					#SET{val,2}
					<div class="choix">
						<input type="checkbox" name="#GET{name}#EVAL{chr(91)}#EVAL{chr(93)}" class="checkbox" id="#GET{name}_#GET{val}" value="#GET{val}"[(#GET{val}|in_any{#ENV{#GET{name},#GET{defaut}}}|oui)checked="checked"] />
						<label for="#GET{name}_#GET{val}">[(#GET{fl}|concat{':label_',#GET{name},'_',#GET{val}}|_T)]</label>
					</div>
				</li>
				#SET{name,checkboxouiounon}#SET{obli,''}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
				<li class="editer editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
					<label>[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
					<span class='erreur_message'>(#GET{erreurs})</span>
					]
					<p class="explication">Des explications au-dessus d'un choix</p>
					#SET{val,non}
					<input type="hidden" name="#GET{name}" value="#GET{val}" />
					#SET{val,oui}
					<div class="choix">
						<input type="checkbox" name="#GET{name}" class="checkbox" id="#GET{name}_#GET{val}" value="#GET{val}"[(#ENV{#GET{name},#GET{defaut}}|=={#GET{val}}|oui)checked="checked"] />
						<label for="#GET{name}_#GET{val}">[(#GET{fl}|concat{':label_',#GET{name},'_',#GET{val}}|_T)]</label>
					</div>
				</li>

				<li class="fieldset">
					<fieldset>
						<legend><:charter:legend:></legend>
						<ul>
							<!--EX12-->
							#SET{name,text}#SET{obli,''}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
							<li class="editer editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
								<label for="#GET{name}">[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
								<span class='erreur_message'>(#GET{erreurs})</span>
								]<input type="text" name="#GET{name}" class="text" value="#ENV*{#GET{name},#GET{defaut}}" id="#GET{name}" [(#HTML5|et{#GET{obli}})required='required']/>
							</li>
							<!--EX13--> 
							#SET{name,text_obli}#SET{obli,'obligatoire'}#SET{defaut,''}#SET{erreurs,#ENV**{erreurs}|table_valeur{#GET{name}}}
							<li class="editer editer_[(#GET{name})][ (#GET{obli})][ (#GET{erreurs}|oui)erreur]">
								<label for="#GET{name}">[(#GET{fl}|concat{':label_',#GET{name}}|_T)]</label>[
								<span class='erreur_message'>(#GET{erreurs})</span>
								]<input type="text" name="#GET{name}" class="text" value="#ENV*{#GET{name},#GET{defaut}}" id="#GET{name}" [(#HTML5|et{#GET{obli}})required='required']/>
							</li>
						</ul>
					</fieldset>
				</li>
			</ul>
		</fieldset>
	  [(#REM) ajouter les saisies supplémentaires : extra et autre, à cet endroit ]
	  <!--extra-->
	  <p class='boutons'><span class='image_loading'>&nbsp;</span>
			<input type='submit' name="cancel" class='submit' value='<:bouton_annuler|attribut_html:>' />
			<input type='submit' class='submit' value='<:bouton_enregistrer|attribut_html:>' /></p>
	</div></form>
	]
	[(#ENV{editable}|non)
	  <p class='boutons'><span class='image_loading'>&nbsp;</span>
			<input type='submit' name="cancel" class='submit' value='<:bouton_fermer|attribut_html:>' onclick="$.modalboxclose();return false;" />
	]
</div>