<?php 

return [

    'base_table'=>"subclients",
    "default_pk"=>"id",

    'entities' => [


        'alert_carpeta_filters' => [
            'relations' => [
                "carpeta_id"=>"carpetas.id",
                "alert_instance_id"=>"alert_instance.id"
            ]
        ],
        
        "alert_contacts"=>[
            'relations'=>[
                "contact_id"=>"contacts.id",
                "alert_instance_id"=>"alert_instance.id",
                // "sending_media_id"=>"alert_sending_media.id"
            ],
            "missing_fk"=>[
                "contact_id"=>"same_id"
            ]
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
            ]
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
            ]
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
            ]
        ],
        "article_sections"=>[
            "relations"=>[
                "unique_article_id"=>"unique_articles.id",
                "section_id"=>"papers_sections.id"
            ]
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
            ]
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
            ]
        ],

        "client_hallon_search_perms"=>[
            "relations"=>[
                "client_id"=>"clients.id",
                "contact_id"=>"contacts.id"
            ]
        ],

        "clients_cifs"=>[
            "relations"=>[
                "client_id"=>"clients.id",
                "cif_id"=>"cifs.id"
            ]
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
                "tracked_companies_id"=>"companies.id"
            ],
            "set"=>[
                "main_tema_id"=>null,
                "usid"=>null
            ]
        ],

        "companies_has_tema"=>[
            "relations"=>[
                "companies_id"=>"companies.id",
                "tema_id"=>"temas.id"
            ]
        ],

        "companies_values"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
                "companies_id"=>"companies.id"
            ]
        ],

        "contact_has_subclient"=>[
            "relations"=>[
                "contact_id"=>"contacts.id",
                "subclient_id"=>"subclients.id",
            ]
        ],

        "contact_has_telegram_channel"=>[
            "relations"=>[
                "contact_id"=>"contacts.id",
                "telegram_channel_id"=>"telegram_channels.id",
            ]
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
            ]
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
                "custom_view_type_id"=>"custom_view_types.id"
            ]
        ],

        "datastudio_informe"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id"
            ]
        ],

        "grss_feed_to_keyword_subscription"=>[
            "relations"=>[
                "keyword.id"=>"keywords.id",
                "feed_id"=>"google_rss_feed.id"
            ]
        ],

        "grouping"=>[
            "relations"=>[
                "tema_id"=>"temas.id",
                "companies_id"=>"companies.id"
            ]
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
            ]
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
            ]
        ],

        "original_hits"=>[
            "relations"=>[
                "companies_id"=>"companies.id",
                "keyword_id"=>"keywords.id"
            ]
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
            ]
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
            ]
        ],

        "subclient_has_template"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
                "template_id"=>"headers_templates.id"
            ]
        ],

        "template_uses_script"=>[
            "relations"=>[
                "script_id"=>"header_scripts.id",
                "sht_id"=>"subclient_has_template.id"
            ]
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
            ]
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
            ]
        ],

        "temas"=>[
            "relations"=>[
                "subclient_id"=>"subclients.id",
                "parent_id"=>"temas.id",
                //"grouping_type"=>"grouping_types.id"
            ]
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
