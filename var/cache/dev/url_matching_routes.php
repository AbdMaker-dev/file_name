<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/formateur/briefs' => [[['_route' => 'postBriefs', '_controller' => 'App\\Controller\\BriefController::postBriefs'], null, ['POST' => 0], null, false, false, null]],
        '/api/admin/groupe_competencessssssssssss' => [[['_route' => 'add_gr_competence', '_controller' => 'App\\Controller\\GrCompetenceController::addGroupeComptence'], null, ['POST' => 0], null, false, false, null]],
        '/api/admin/promo' => [[['_route' => 'add_promo', '_controller' => 'App\\Controller\\PromoController::addPromo'], null, ['POST' => 0], null, false, false, null]],
        '/api/admin/referentiels' => [[['_route' => 'referentiel_add', '_controller' => 'App\\Controller\\ReferentielController::addReferentiel'], null, ['POST' => 0], null, false, false, null]],
        '/api/admin/users/registre' => [[['_route' => 'users_registre', '_controller' => 'App\\Controller\\UserController::addUser'], null, ['POST' => 0], null, false, false, null]],
        '/api/admin/promo/principal' => [[['_route' => 'api_promos_promo_princi_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_collection_operation_name' => 'promo_princi'], null, ['GET' => 0], null, false, false, null]],
        '/api/admin/promo/apprenants/attente' => [[['_route' => 'api_promos_promo_appre_attente_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_collection_operation_name' => 'promo_appre_attente'], null, ['GET' => 0], null, false, false, null]],
        '/api/login' => [[['_route' => 'authentication_token'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api(?'
                    .'|/(?'
                        .'|formateur/(?'
                            .'|promo(?'
                                .'|/([^/]++)/groupe/([^/]++)/briefs(*:106)'
                                .'|s/([^/]++)/briefs(*:131)'
                            .')'
                            .'|([^/]++)/briefs/(?'
                                .'|broullons(*:168)'
                                .'|valide(*:182)'
                            .')'
                            .'|promo/([^/]++)/briefs/([^/]++)(*:221)'
                            .'|briefs/([^/]++)(*:244)'
                        .')'
                        .'|admin/(?'
                            .'|groupe_competences/([^/]++)(*:289)'
                            .'|promo/([^/]++)/(?'
                                .'|groupes/([^/]++)(?'
                                    .'|/apprenants(*:345)'
                                    .'|(*:353)'
                                .')'
                                .'|apprenants(*:372)'
                                .'|formateurs(*:390)'
                            .')'
                            .'|referentiels/([^/]++)(*:420)'
                            .'|users/update/([^/]++)(*:449)'
                        .')'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:487)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:518)'
                        .'|c(?'
                            .'|ontexts/(.+)(?:\\.([^/]++))?(*:557)'
                            .'|ritere_(?'
                                .'|evaluations(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:607)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:645)'
                                    .')'
                                .')'
                                .'|admissions(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:686)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:724)'
                                    .')'
                                .')'
                            .')'
                            .'|ms(?'
                                .'|(?:\\.([^/]++))?(*:755)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:789)'
                            .')'
                        .')'
                        .'|a(?'
                            .'|dmin(?'
                                .'|/(?'
                                    .'|groupe_(?'
                                        .'|competences(?'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:856)'
                                            .')'
                                            .'|/(?'
                                                .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                                    .'|(*:897)'
                                                .')'
                                                .'|([^/]++)/competences(?:\\.([^/]++))?(*:941)'
                                            .')'
                                        .')'
                                        .'|tags(?'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:976)'
                                            .')'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:1014)'
                                            .')'
                                        .')'
                                    .')'
                                    .'|pro(?'
                                        .'|mo(?'
                                            .'|s(?'
                                                .'|(?:\\.([^/]++))?(*:1056)'
                                                .'|/(?'
                                                    .'|([^/\\.]++)(?:\\.([^/]++))?(*:1094)'
                                                    .'|([^/]++)/(?'
                                                        .'|referentiel(?:\\.([^/]++))?(*:1141)'
                                                        .'|formateurs(?:\\.([^/]++))?(*:1175)'
                                                    .')'
                                                .')'
                                            .')'
                                            .'|/([^/]++)/(?'
                                                .'|principal(*:1209)'
                                                .'|referentiels(?'
                                                    .'|(*:1233)'
                                                .')'
                                                .'|apprenants/attente(*:1261)'
                                                .'|formateurs(*:1280)'
                                            .')'
                                        .')'
                                        .'|files(?'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:1317)'
                                            .')'
                                            .'|/(?'
                                                .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                                    .'|(*:1359)'
                                                .')'
                                                .'|([^/]++)/users(?:\\.([^/]++))?(*:1398)'
                                            .')'
                                        .')'
                                    .')'
                                    .'|tags(?'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:1435)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:1474)'
                                        .')'
                                    .')'
                                    .'|users(?'
                                        .'|(?:\\.([^/]++))?(*:1508)'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1543)'
                                    .')'
                                    .'|referentiels(?'
                                        .'|(?:\\.([^/]++))?(*:1583)'
                                        .'|/(?'
                                            .'|grpecompetences(*:1611)'
                                            .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:1648)'
                                            .')'
                                        .')'
                                    .')'
                                    .'|competences(?'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:1692)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:1731)'
                                        .')'
                                    .')'
                                .')'
                                .'|s(?'
                                    .'|(?:\\.([^/]++))?(*:1762)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1797)'
                                .')'
                            .')'
                            .'|pprenants(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1838)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1877)'
                                .')'
                            .')'
                        .')'
                        .'|niveaux(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1917)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1956)'
                            .')'
                        .')'
                        .'|formateur(?'
                            .'|s(?'
                                .'|(?:\\.([^/]++))?(*:1998)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2033)'
                            .')'
                            .'|/briefs(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2071)'
                                .')'
                                .'|/(?'
                                    .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:2113)'
                                    .')'
                                    .'|([^/]++)/brief_promotions(?:\\.([^/]++))?(*:2163)'
                                .')'
                            .')'
                        .')'
                        .'|l(?'
                            .'|angues(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2206)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2245)'
                                .')'
                            .')'
                            .'|ivrable_(?'
                                .'|partiels(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:2296)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:2335)'
                                    .')'
                                .')'
                                .'|attenduses(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:2377)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:2416)'
                                    .')'
                                .')'
                                .'|rendus(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:2454)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:2493)'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|statut_livrables(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:2543)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:2582)'
                            .')'
                        .')'
                        .'|brief_promotions(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:2630)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:2669)'
                            .')'
                        .')'
                        .'|etat_brief(?'
                            .'|_groupes(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2722)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2761)'
                                .')'
                            .')'
                            .'|s(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2794)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2833)'
                                .')'
                            .')'
                        .')'
                        .'|ressources(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:2876)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:2915)'
                            .')'
                        .')'
                        .'|groupes(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:2954)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:2993)'
                            .')'
                        .')'
                        .'|profile_sorties(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:3040)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:3079)'
                            .')'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        106 => [[['_route' => 'promo_id_groupe_id_briefs', '_controller' => 'App\\Controller\\BriefController::getPromoIdGroupeIdBriefs'], ['id', 'di'], ['GET' => 0], null, false, false, null]],
        131 => [[['_route' => 'promo_id_briefs', '_controller' => 'App\\Controller\\BriefController::getPromoIdBriefs'], ['id'], ['GET' => 0], null, false, false, null]],
        168 => [[['_route' => 'getFormateurIdBriefsBroullon', '_controller' => 'App\\Controller\\BriefController::getFormateurIdBriefsBroullon'], ['id'], ['GET' => 0], null, false, false, null]],
        182 => [[['_route' => 'getFormateurIdBriefsValider', '_controller' => 'App\\Controller\\BriefController::getFormateurIdBriefsValider'], ['id'], ['GET' => 0], null, false, false, null]],
        221 => [[['_route' => 'getPromoIdBriefsId', '_controller' => 'App\\Controller\\BriefController::getPromoIdBriefsId'], ['id', 'di'], ['GET' => 0], null, false, true, null]],
        244 => [[['_route' => 'postBriefsId', '_controller' => 'App\\Controller\\BriefController::postBriefsId'], ['di'], ['POST' => 0], null, false, true, null]],
        289 => [[['_route' => 'update_gr_competence', '_controller' => 'App\\Controller\\GrCompetenceController::updateGroupeComptence'], ['id'], ['PUT' => 0], null, false, true, null]],
        345 => [[['_route' => 'get_promo_id_group_id', '_controller' => 'App\\Controller\\PromoController::getPromoIdGroupIdApprenants'], ['id', 'di'], ['GET' => 0], null, false, false, null]],
        353 => [[['_route' => 'update_promo_id_groupd_id', '_controller' => 'App\\Controller\\PromoController::updatePromoIdGroupdId'], ['id', 'di'], ['PUT' => 0], null, false, true, null]],
        372 => [[['_route' => 'update_promo_id_appre', '_controller' => 'App\\Controller\\PromoController::updatePromoIdAppre'], ['id'], ['PUT' => 0], null, false, false, null]],
        390 => [[['_route' => 'update_promo_id_Form', '_controller' => 'App\\Controller\\PromoController::updatePromoIdForm'], ['id'], ['PUT' => 0], null, false, false, null]],
        420 => [[['_route' => 'referentiel_update', '_controller' => 'App\\Controller\\ReferentielController::updateReferentiel'], ['id'], ['PUT' => 0], null, false, true, null]],
        449 => [[['_route' => 'users_update', '_controller' => 'App\\Controller\\UserController::updateUser'], ['id'], ['PUT' => 0], null, false, true, null]],
        487 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        518 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        557 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        607 => [
            [['_route' => 'api_critere_evaluations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\CritereEvaluation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_critere_evaluations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\CritereEvaluation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        645 => [
            [['_route' => 'api_critere_evaluations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CritereEvaluation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_critere_evaluations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CritereEvaluation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_critere_evaluations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CritereEvaluation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_critere_evaluations_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CritereEvaluation', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        686 => [
            [['_route' => 'api_critere_admissions_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\CritereAdmission', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_critere_admissions_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\CritereAdmission', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        724 => [
            [['_route' => 'api_critere_admissions_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CritereAdmission', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_critere_admissions_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CritereAdmission', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_critere_admissions_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CritereAdmission', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_critere_admissions_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CritereAdmission', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        755 => [[['_route' => 'api_cms_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Cm', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        789 => [[['_route' => 'api_cms_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Cm', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        856 => [
            [['_route' => 'api_groupe_competences_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groupe_competences_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        897 => [
            [['_route' => 'api_groupe_competences_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groupe_competences_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        941 => [[['_route' => 'api_groupe_competences_competences_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_subresource_operation_name' => 'api_groupe_competences_competences_get_subresource', '_api_subresource_context' => ['property' => 'competences', 'identifiers' => [['id', 'App\\Entity\\GroupeCompetence', true]], 'collection' => true, 'operationId' => 'api_groupe_competences_competences_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        976 => [
            [['_route' => 'api_groupe_tags_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeTag', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groupe_tags_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeTag', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1014 => [
            [['_route' => 'api_groupe_tags_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeTag', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groupe_tags_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeTag', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        1056 => [[['_route' => 'api_promos_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        1094 => [[['_route' => 'api_promos_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1141 => [[['_route' => 'api_promos_referentiel_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_subresource_operation_name' => 'api_promos_referentiel_get_subresource', '_api_subresource_context' => ['property' => 'referentiel', 'identifiers' => [['id', 'App\\Entity\\Promo', true]], 'collection' => false, 'operationId' => 'api_promos_referentiel_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1175 => [[['_route' => 'api_promos_formateurs_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Formateur', '_api_subresource_operation_name' => 'api_promos_formateurs_get_subresource', '_api_subresource_context' => ['property' => 'formateurs', 'identifiers' => [['id', 'App\\Entity\\Promo', true]], 'collection' => true, 'operationId' => 'api_promos_formateurs_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1209 => [[['_route' => 'api_promos_promo_id_princi_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'promo_id_princi'], ['id'], ['GET' => 0], null, false, false, null]],
        1233 => [
            [['_route' => 'api_promos_get_promo_id_ref_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'get_promo_id_ref'], ['id'], ['GET' => 0], null, false, false, null],
            [['_route' => 'api_promos_promo_id_ref_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'promo_id_ref'], ['id'], ['PUT' => 0], null, false, false, null],
        ],
        1261 => [[['_route' => 'api_promos_promo_id_appre_attente_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'promo_id_appre_attente'], ['id'], ['GET' => 0], null, false, false, null]],
        1280 => [[['_route' => 'api_promos_get_promo_id_form_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'get_promo_id_form'], ['id'], ['GET' => 0], null, false, false, null]],
        1317 => [
            [['_route' => 'api_profiles_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profile', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_profiles_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profile', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1359 => [
            [['_route' => 'api_profiles_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profile', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_profiles_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profile', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_profiles_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profile', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1398 => [[['_route' => 'api_profiles_users_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_subresource_operation_name' => 'api_profiles_users_get_subresource', '_api_subresource_context' => ['property' => 'users', 'identifiers' => [['id', 'App\\Entity\\Profile', true]], 'collection' => true, 'operationId' => 'api_profiles_users_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1435 => [
            [['_route' => 'api_tags_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Tags', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_tags_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Tags', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1474 => [
            [['_route' => 'api_tags_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Tags', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_tags_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Tags', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        1508 => [[['_route' => 'api_users_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        1543 => [[['_route' => 'api_users_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1583 => [[['_route' => 'api_referentiels_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        1611 => [[['_route' => 'api_referentiels_ref_gpc_c_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_collection_operation_name' => 'ref_gpc_c'], [], ['GET' => 0], null, false, false, null]],
        1648 => [
            [['_route' => 'api_referentiels_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_referentiels_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        1692 => [
            [['_route' => 'api_competences_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_competences_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1731 => [
            [['_route' => 'api_competences_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_competences_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        1762 => [[['_route' => 'api_admins_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Admin', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        1797 => [[['_route' => 'api_admins_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Admin', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1838 => [
            [['_route' => 'api_apprenants_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Apprenant', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_apprenants_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Apprenant', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1877 => [
            [['_route' => 'api_apprenants_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Apprenant', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_apprenants_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Apprenant', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        1917 => [
            [['_route' => 'api_niveaux_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_niveaux_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1956 => [
            [['_route' => 'api_niveaux_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_niveaux_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        1998 => [[['_route' => 'api_formateurs_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Formateur', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        2033 => [[['_route' => 'api_formateurs_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Formateur', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2071 => [
            [['_route' => 'api_briefs_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Brief', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_briefs_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Brief', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2113 => [
            [['_route' => 'api_briefs_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Brief', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_briefs_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Brief', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_briefs_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Brief', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_briefs_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Brief', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        2163 => [[['_route' => 'api_briefs_brief_promotions_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\BriefPromotions', '_api_subresource_operation_name' => 'api_briefs_brief_promotions_get_subresource', '_api_subresource_context' => ['property' => 'briefPromotions', 'identifiers' => [['id', 'App\\Entity\\Brief', true]], 'collection' => true, 'operationId' => 'api_briefs_brief_promotions_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2206 => [
            [['_route' => 'api_langues_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Langue', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_langues_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Langue', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2245 => [
            [['_route' => 'api_langues_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Langue', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_langues_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Langue', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_langues_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Langue', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_langues_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Langue', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        2296 => [
            [['_route' => 'api_livrable_partiels_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrablePartiel', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_livrable_partiels_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrablePartiel', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2335 => [
            [['_route' => 'api_livrable_partiels_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrablePartiel', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_livrable_partiels_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrablePartiel', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_livrable_partiels_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrablePartiel', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_livrable_partiels_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrablePartiel', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        2377 => [
            [['_route' => 'api_livrable_attenduses_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrableAttendus', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_livrable_attenduses_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrableAttendus', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2416 => [
            [['_route' => 'api_livrable_attenduses_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrableAttendus', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_livrable_attenduses_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrableAttendus', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_livrable_attenduses_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrableAttendus', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_livrable_attenduses_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrableAttendus', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        2454 => [
            [['_route' => 'api_livrable_rendus_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrableRendu', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_livrable_rendus_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrableRendu', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2493 => [
            [['_route' => 'api_livrable_rendus_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrableRendu', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_livrable_rendus_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrableRendu', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_livrable_rendus_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrableRendu', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_livrable_rendus_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\LivrableRendu', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        2543 => [
            [['_route' => 'api_statut_livrables_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\StatutLivrable', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_statut_livrables_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\StatutLivrable', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2582 => [
            [['_route' => 'api_statut_livrables_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\StatutLivrable', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_statut_livrables_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\StatutLivrable', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_statut_livrables_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\StatutLivrable', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_statut_livrables_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\StatutLivrable', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        2630 => [
            [['_route' => 'api_brief_promotions_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\BriefPromotions', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_brief_promotions_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\BriefPromotions', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2669 => [
            [['_route' => 'api_brief_promotions_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\BriefPromotions', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_brief_promotions_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\BriefPromotions', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_brief_promotions_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\BriefPromotions', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_brief_promotions_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\BriefPromotions', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        2722 => [
            [['_route' => 'api_etat_brief_groupes_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\EtatBriefGroupes', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_etat_brief_groupes_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\EtatBriefGroupes', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2761 => [
            [['_route' => 'api_etat_brief_groupes_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\EtatBriefGroupes', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_etat_brief_groupes_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\EtatBriefGroupes', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_etat_brief_groupes_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\EtatBriefGroupes', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_etat_brief_groupes_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\EtatBriefGroupes', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        2794 => [
            [['_route' => 'api_etat_briefs_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\EtatBrief', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_etat_briefs_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\EtatBrief', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2833 => [
            [['_route' => 'api_etat_briefs_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\EtatBrief', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_etat_briefs_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\EtatBrief', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_etat_briefs_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\EtatBrief', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_etat_briefs_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\EtatBrief', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        2876 => [
            [['_route' => 'api_ressources_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Ressource', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_ressources_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Ressource', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2915 => [
            [['_route' => 'api_ressources_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Ressource', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_ressources_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Ressource', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_ressources_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Ressource', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_ressources_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Ressource', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        2954 => [
            [['_route' => 'api_groupes_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Groupe', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groupes_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Groupe', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2993 => [
            [['_route' => 'api_groupes_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Groupe', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groupes_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Groupe', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        3040 => [
            [['_route' => 'api_profile_sorties_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfileSortie', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_profile_sorties_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfileSortie', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        3079 => [
            [['_route' => 'api_profile_sorties_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfileSortie', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_profile_sorties_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfileSortie', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_profile_sorties_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfileSortie', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
