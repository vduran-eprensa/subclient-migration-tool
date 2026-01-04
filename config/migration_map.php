<?php 

/*
    Description:

    * default_pk: Default primary key field name.
    * missing_fk: what to do with missing references: DEFAULT=NULL | same_id=use id from source
    * set: Forces a value on a field. Overrides source value
    * cut: Prevents exporing the table through that field. When a record is analyzed, the code will search its dependencies and dependants. 
            This cut prevents exploring dependants from some fields.
    * unique_by: indicates which field makes a record unique. This helps detecting when a record has already been migrated but the ID is not in the subclient_migration table. Must not be used with FKs since it checks for exactly the same value from source in target.

*/

return [
    "default_pk"=>"id",

    'entities' => [


        'alert_carpeta_filters' => [
            'relations' => [
                "carpeta_id"=>"carpetas.id",
                "alert_instance_id"=>"alert_instance.id"
            ],
            "cut"=>["carpeta_id"]
        ],
        
        "alert_contacts"=>[
            'relations'=>[
                "contact_id"=>"contacts.id",
                "alert_instance_id"=>"alert_instance.id",
                // "sending_media_id"=>"alert_sending_media.id"
            ],
            "missing_fk"=>[
                "contact_id"=>"same_id"
            ],
            "cut"=>["contact_id"]
        ],

        "alert_custom_php"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id"
            ]
        ],

        "alert_instance"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
                "created_by_contact"=>"contacts.id",
                "last_mod_by_contact"=>"contacts.id",
                //"holidays_template_id"=>"holiday_templates.id",
                "signature_id"=>"email_signatures.id",
                //"mail_frequency"=>"mail_frequency.id",
                //"mail_type"=>"mail_types.id",
                //"country_for_timezone"=>"countries.id",
                "whatsapp_template_id"=>"whatsapp_templates.id",
                "from_alias_id"=>"instance_from_alias.id",
                "telegram_template_id"=>"telegram_templates.id",
                "tg_channel_id"=>"telegram_channels.id"
            ],
            "missing_fk"=>[ // default is set null
                "last_mod_by_contact"=>"same_id", // Use same ID as original record
                "created_by_contact"=>"same_id"
            ],
            "cut"=>["created_by_contact","whatsapp_template_id","from_alias_id","telegram_template_id","tg_channel_id"]
        ],
        "alert_simple_filters"=>[
            "relations"=>[
                "alert_instance_id"=>"alert_instance.id"
            ]
        ],
        "alert_tema_filters"=>[
            "relations"=>[
                "tema_id"=>"temas.id",
                "alert_instance_id"=>"alert_instance.id"
            ],
            "cut"=>["tema_id"]
        ],
        "alert_timeslots"=>[
            "relations"=>[
                "alert_instance_id"=>"alert_instance.id"
            ]
        ],
        "article_authors"=>[
            "relations"=>[
                "unique_article_id"=>"unique_articles.id",
                "author_id"=>"authors.id"
            ],
            "cut"=>["author_id"]
        ],
        "article_sections"=>[
            "relations"=>[
                "unique_article_id"=>"unique_articles.id",
                "section_id"=>"papers_sections.id"
            ],
            "cut"=>["section_id"]
        ],
        "attachment_options"=>[
            "relations"=>[
                "alert_instance_id"=>"alert_instance.id"
            ]
        ],
        "av_clients_packs"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
                "created_by"=>"contacts.id"
            ],
            "cut"=>["created_by"]
        ],
        "carpetas"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
                //"tag_type_id"=>"tag_types.id"
            ]
        ],

        "carpetas_values"=>[
            "relations"=>[
                "carpeta_id"=>"carpetas.id",
                "companies_id"=>"companies.id"
            ],
            "cut"=>["carpeta_id"]
        ],

        "client_hallon_search_perms"=>[
            "relations"=>[
                "client_id"=>"clients.id",
                "contact_id"=>"contacts.id"
            ],
            "cut"=>["client_id"]
        ],

        "clients_cifs"=>[
            "relations"=>[
                "client_id"=>"clients.id",
                "cif_id"=>"cifs.id"
            ],
            "cut"=>["cif_id"]
        ],

        "companies"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
                "hidden_by_contact"=>"contacts.id",
                //"add_type"=>"add_types.id",
                //"tono"=>"tonos.id",
                //"domain_id"=>"domains.id",
                "manual_domains_id"=>"manual_domains.id",
                //"created_pdf_type"=>"pdf_types.id",
                //"companies_group_id"=>"grouping.group_id",
                //"main_tema_id"=>"temas.id",
                //"secondary_tema_ids"=>"temas.id",
                //"usid"=>"subclients.id",
                "unique_article_id"=>"unique_articles.id",
                "emailed_by_instance_id"=>"alert_instance.id",
                //"tracked_companies_id"=>"companies.id"
            ],
            "set"=>[
                "main_tema_id"=>null,
                "usid"=>null,
                "tracked_companies_id"=>null
            ],
            "cut"=>["hidden_by_contact","manual_domains_id","unique_article_id","emailed_by_instance_id"],
            "async"=>true
        ],

        "companies_has_tema"=>[
            "relations"=>[
                "companies_id"=>"companies.id",
                "tema_id"=>"temas.id"
            ],
            "cut"=>["tema_id"]
        ],

        "companies_values"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
                "companies_id"=>"companies.id"
            ],
            "cut"=>["subclient_id"]
        ],

        "contact_has_subclient"=>[
            "relations"=>[
                "contact_id"=>"contacts.id",
                "subclient_id"=>"subclients.id",
            ],
            "cut"=>["contact_id"],
            "missing_fk"=>[
                "contact_id"=>"skip"
            ]
        ],

        "contact_has_telegram_channel"=>[
            "relations"=>[
                "contact_id"=>"contacts.id",
                "telegram_channel_id"=>"telegram_channels.id",
            ],
            "cut"=>["telegram_channel_id"]
        ],

        "telegram_channels"=>[
            "relations"=>[
                "telegram_account_id"=>"telegram_accounts.id"
            ] 
        ],

        "telegram_accounts"=>[
            "relations"=>[
                //"external_companies_id"=>"external_companies.id",
                "telegram_app_id"=>"telegram_apps.id",
            ]
        ],

        "contacts"=>[
            "relations"=>[
                //"user_type"=>"user_types.id",
                //"external_companies_id"=>"external_companies.id"
                "mg_id"=>"mailgun_accounts.id",
                "telegram_account_id"=>"telegram_accounts.id",
                "pdf_viewer_id"=>"pdf_viewer.id",
            ],
            "cut"=>["mg_id","telegram_account_id","pdf_viewer_id"]
        ],

        "custom_orderby"=>[
            "relations"=>[
                "custom_view_id"=>"custom_view.id"
            ]
        ],

        "custom_php_email"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id"
            ]
        ],

        "custom_view"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
                "custom_view_types_id"=>"custom_view_types.id"
            ],
            "cut"=>["custom_view_types_id"],
            "set"=>["usid"=>null]
        ],

        "custom_view_types"=>[
            "relations"=>[],
            "unique_by"=>['description_type']
        ],

        "datastudio_informe"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id"
            ]
        ],

        "grss_feed_to_keyword_subscription"=>[
            "relations"=>[
                "keyword_id"=>"keywords.id",
                "feed_id"=>"google_rss_feed.id"
            ],
            "cut"=>["feed_id"]
        ],

        "grouping"=>[
            "relations"=>[
                "tema_id"=>"temas.id",
                "companies_id"=>"companies.id"
            ],
            "cut"=>["tema_id"]
        ],

        "hallon_eyes_purchases"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id"
            ]
        ],

        "hit_by"=>[
            "relations"=>[
                "keywords_id"=>"keywords.id",
                "companies_id"=>"companies.id"
            ],
            "missing_fk"=>[
                "keywords_id"=>"SET=0"
            ],
            "cut"=>["keywords_id"]
        ],

        "intervals_247"=>[
            "relations"=>[
                "alert_instance_id"=>"alert_instance.id"
            ]
        ],

        "keywords"=>[
            "relations"=>[
                "tem_id"=>"temas.id"
            ]
        ],

        "manual_domains"=>[
            "relations"=>[
                "tema_id"=>"temas.id",
                //"tematica_id"=>"tematicas.id"
            ],
            "cut"=>["tema_id"]
        ],

        "original_hits"=>[
            "relations"=>[
                "companies_id"=>"companies.id",
                "keyword_id"=>"keywords.id"
            ],
            "missing_fk"=>[
                "keyword_id"=>"SET=0"
            ],
            "cut"=>["keyword_id"]
        ],

        "rrss"=>[
            "relations"=>[
                "companies_id"=>"companies.id"
            ]
        ],

        "selecciones"=>[
            "relations"=>[
                "tema_id"=>"temas.id",
                //"domain_id"=>"domains.id"
            ]
        ],

        "selected_template"=>[
            "relations"=>[
                "alert_instance_id"=>"alert_instance.id",
                "custom_php_id"=>"alert_custom_php.id"
            ],
            "cut"=>["custom_php_id"]
        ],

        "special_values"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id"
            ]
        ],

        "subclient_email"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
                "contact_id"=>"contacts.id",
                //"mail_type"=>"mail_types.id"
                //"mail_frequency"=>"mail_frequency.id"
                //"mail_types_id"=>"mail_types.id"
            ],
            "cut"=>["contact_id"],
            "missing_fk"=>[
                "contact_id"=>"skip"
            ]
        ],

        "subclient_has_template"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
                "template_id"=>"headers_templates.id"
            ],
            "cut"=>["template_id"]
        ],

        "template_uses_script"=>[
            "relations"=>[
                "script_id"=>"header_scripts.id",
                "sht_id"=>"subclient_has_template.id"
            ],
            "cut"=>["script_id"]
        ],

        "subclient_tiers"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
            ]
        ],

        "subclients_reports"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id"
            ]
        ],

        "subclients"=>[
            "relations"=>[
                "client_id"=>"clients.id",
                "added_by"=>"contacts.id",
                "modified_by"=>"contacts.id",
                //"sister_subclient_id"=>"subclients.id",
                "seller_id"=>"contacts.id",
                //"unique_subclient_id"=>"subclients.id",
            ],
            "cut"=>["client_id","added_by","modified_by","seller_id"]
        ],

        "tema_has_pw_subscription"=>[
            "relations"=>[
                "tema_id"=>"temas.id",
                //"domain_id"=>"domains.id"
            ]
        ],

        "tema_has_tematica"=>[
            "relations"=>[
                "tema_id"=>"temas.id",
                //"tematica_id"=>"tematicas.id"
            ]
        ],

        "tema_values"=>[
            "relations"=>[
                "tema_id"=>"temas.id",
                "parent_tema_id"=>"temas.id"
            ],
            "cut"=>["parent_tema_id"]
        ],

        "temas"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
                "parent_id"=>"temas.id",
                //"grouping_type"=>"grouping_types.id"
            ],
            "cut"=>["parent_id"]
        ],

        "templates_report"=>[
            "relations"=>[
                "unique_subclient_id"=>"subclients.id"
            ]
        ],

        "clients"=>[
            "relations"=>[],
            "unique_by"=>["client"]
        ],
        "mailgun_accounts"=>[
            "relations"=>[],
            "unique_by"=>["domain_fqdn"]
        ],
        "pdf_viewer"=>[
            "relations"=>[],
            "unique_by"=>["viewer_name"]
        ],
        "whatsapp_templates"=>[
            "relations"=>[],
            "unique_by"=>["template_name"]
        ]
    ]
];
