#!/bin/bash

DUMP_DIR="../prestashop/database-dump"
DUMP_FILE="dump.sql"
DB_CONTAINER_NAME="some-mysql"
DB_NAME="prestashop"
DB_PASSWORD="admin"

echo "Creating database dump..."

TABLES=(
  "ps_order_payment"         # Płatności
  "ps_module"                # Moduły
  "ps_carrier"               # Przewoźnicy
  "ps_configuration"         # Konfiguracja SMTP i inne ustawienia globalne
  "ps_cms"                   # Strony CMS
  "ps_employee"              # Konto administratora
  "ps_configuration_lang"
  "ps_link_block"
  "ps_link_block_lang"
  "ps_linksmenutop"
  "ps_access"                # Dostępy
  "ps_accessory"             # Akcesoria
  "ps_address"               # Adresy
  "ps_address_format"        # Format adresów
  "ps_admin_filter"          # Filtry administratora
  "ps_alias"                 # Alias
  "ps_attachment"            # Załączniki
  "ps_attachment_lang"       # Załączniki - język
  "ps_attribute"             # Atrybuty produktów
  "ps_attribute_group"       # Grupy atrybutów
  "ps_attribute_group_lang"  # Grupy atrybutów - język
  "ps_attribute_group_shop"  # Grupy atrybutów - sklep
  "ps_attribute_impact"      # Wpływ atrybutu
  "ps_attribute_lang"        # Atrybuty - język
  "ps_attribute_shop"        # Atrybuty - sklep
  "ps_authorization_role"    # Role autoryzacji
  "ps_blockwishlist_statistics" # Statystyki wishlist
  "ps_carrier_group"         # Grupy przewoźników
  "ps_carrier_lang"          # Przewoźnicy - język
  "ps_carrier_shop"          # Przewoźnicy - sklep
  "ps_carrier_tax_rules_group_shop" # Zasady podatkowe przewoźników
  "ps_carrier_zone"          # Strefy przewoźników
  "ps_cart"                  # Koszyki
  "ps_cart_cart_rule"        # Reguły koszyków
  "ps_cart_product"          # Produkty w koszykach
  "ps_cart_rule"             # Reguły koszyków
  "ps_cart_rule_carrier"     # Reguły przewoźników w koszykach
  "ps_cart_rule_combination" # Kombinacje reguł koszyków
  "ps_cart_rule_country"     # Reguły krajów w koszykach
  "ps_cart_rule_group"       # Grupy reguł koszyków
  "ps_cart_rule_lang"        # Reguły koszyków - język
  "ps_cart_rule_product_rule" # Reguły produktów w koszykach
  "ps_cart_rule_product_rule_group" # Grupy reguł produktów w koszykach
  "ps_cart_rule_product_rule_value" # Wartości reguł produktów w koszykach
  "ps_cart_rule_shop"        # Reguły koszyków - sklep
  "ps_category"              # Kategorie produktów
  "ps_category_group"        # Grupy kategorii
  "ps_category_lang"         # Kategorie - język
  "ps_category_product"      # Produkty w kategoriach
  "ps_category_shop"         # Kategorie - sklep
  "ps_cms"                   # Strony CMS
  "ps_cms_category"          # Kategorie stron CMS
  "ps_cms_category_lang"     # Kategorie stron CMS - język
  "ps_cms_category_shop"     # Kategorie stron CMS - sklep
  "ps_cms_lang"              # Strony CMS - język
  "ps_cms_role"              # Role CMS
  "ps_cms_role_lang"         # Role CMS - język
  "ps_cms_shop"              # Strony CMS - sklep
  "ps_configuration_kpi"     # Kluczowe wskaźniki wydajności konfiguracji
  "ps_configuration_kpi_lang" # KPI - język
  "ps_connections"           # Połączenia
  "ps_connections_page"      # Połączenia stron
  "ps_connections_source"    # Źródła połączeń
  "ps_contact"               # Kontakty
  "ps_contact_lang"          # Kontakty - język
  "ps_contact_shop"          # Kontakty - sklep
  "ps_country"               # Kraje
  "ps_country_lang"          # Kraje - język
  "ps_country_shop"          # Kraje - sklep
  "ps_currency"              # Waluty
  "ps_currency_lang"         # Waluty - język
  "ps_currency_shop"         # Waluty - sklep
  "ps_customer"              # Klienci
  "ps_customer_group"        # Grupy klientów
  "ps_customer_message"      # Wiadomości klientów
  "ps_customer_message_sync_imap" # Synchronizacja wiadomości klientów
  "ps_customer_session"      # Sesje klientów
  "ps_customer_thread"       # Wątki klientów
  "ps_customization"         # Personalizacje
  "ps_customization_field"   # Pola personalizacji
  "ps_customization_field_lang" # Pola personalizacji - język
  "ps_customized_data"       # Dostosowane dane
  "ps_date_range"            # Zakresy dat
  "ps_delivery"              # Dostawa
  "ps_emailsubscription"     # Subskrypcje e-mail
  "ps_employee_session"      # Sesje pracowników
  "ps_employee_shop"         # Sklep pracowników
  "ps_fb_category_match"     # Dopasowanie kategorii na Facebooku
  "ps_feature"               # Cechy produktów
  "ps_feature_flag"          # Flagi cech
  "ps_feature_lang"          # Cechy - język
  "ps_feature_product"       # Cechy produktów
  "ps_feature_shop"          # Cechy sklepów
  "ps_feature_value"         # Wartości cech
  "ps_feature_value_lang"    # Wartości cech - język
  "ps_gender"                # Płeć
  "ps_gender_lang"           # Płeć - język
  "ps_group"                 # Grupy
  "ps_group_lang"            # Grupy - język
  "ps_group_reduction"       # Zniżki grupowe
  "ps_group_shop"            # Grupy - sklep
  "ps_gsitemap_sitemap"      # Mapa strony
  "ps_guest"                 # Goście
  "ps_homeslider"            # Slider na stronie głównej
  "ps_homeslider_slides"     # Slajdy slidera
  "ps_homeslider_slides_lang" # Slajdy slidera - język
  "ps_hook"                  # Hooki
  "ps_hook_alias"            # Alias hooków
  "ps_hook_module"           # Moduły hooków
  "ps_hook_module_exceptions" # Wyjątki hooków
  "ps_image"                 # Obrazy produktów
  "ps_image_lang"            # Obrazy - język
  "ps_image_shop"            # Obrazy - sklep
  "ps_image_type"            # Typy obrazów
  "ps_import_match"          # Dopasowanie importu
  "ps_info"                  # Informacje o produkcie
  "ps_info_lang"             # Informacje - język
  "ps_info_shop"             # Informacje - sklep
  "ps_lang"                  # Języki
  "ps_lang_shop"             # Języki - sklep
  "ps_layered_category"      # Kategorie dla warstwowego filtrowania
  "ps_layered_filter"        # Filtry warstwowe
  "ps_layered_filter_block"  # Bloki filtrów warstwowych
  "ps_layered_filter_shop"   # Filtry warstwowe - sklep
  "ps_layered_indexable_attribute_group" # Grupy atrybutów indeksowane warstwowo
  "ps_layered_indexable_attribute_group_lang_value" # Wartości atrybutów grupy
  "ps_layered_indexable_attribute_lang_value" # Wartości atrybutu
)

TABLES_STRING=$(printf " %s" "${TABLES[@]}")
docker exec $DB_CONTAINER_NAME mysqldump -u root -p$DB_PASSWORD --skip-lock-tables $DB_NAME $TABLES_STRING > "$DUMP_DIR/$DUMP_FILE"

echo "Database dump saved to $DUMP_DIR/$DUMP_FILE"
