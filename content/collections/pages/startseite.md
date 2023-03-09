---
id: c0a53f6a-b1db-4743-8846-000e71cc87a1
blueprint: page
title: Startseite
updated_by: 04e1ae9a-6ef8-4ba0-931b-7cd69cc0d3a2
updated_at: 1678381513
heading: 'Der Landenhof begleitet hör- und sehbeeinträchtigte Kinder und Jugendliche sowie deren Umfeld'
components:
  -
    id: lcovy82x
    icon_cards:
      -
        id: MnHbXaWH
        title: Hören
        text: 'Erfahren Sie mehr über unsere Angebote für hörbeeinträchtigte Kinder und Jugendliche'
        links:
          -
            id: lcovyjzw
            link_title: Hörabklärungen
            link: 'entry::a488d51c-6a5b-41b6-8854-96e1a26f83ec'
          -
            id: lcovz5nz
            link_title: 'Audiopädagogische Förderung & Beratung'
            link: 'entry::1f3a19ad-12e3-41e5-8df6-33a9051e47d3'
          -
            id: leovvyc4
            link_title: Tagessonderschule
            link: 'entry::a27a611d-7fab-432b-b12a-126c79b6b06f'
        icon: icons/ear.svg
        color_theme: green
      -
        id: lcovzgdx
        title: Sehen
        text: 'Erfahren Sie mehr über unsere Angebote für sehbeeinträchtigte Kinder und Jugendliche'
        links:
          -
            id: lcow04lv
            link_title: Low-Vision-Abklärung
            link: 'entry::54422e76-6270-4f41-99e3-c5a308fcc39b'
          -
            id: lcow05d8
            link_title: 'Heilpädagogische Früherziehung'
            link: 'entry::9d286558-7abb-4b0f-a572-fa332cf8a039'
          -
            id: leovxiai
            link_title: 'Beratung Lehrpersonen'
            link: 'entry::12bc0c34-36e0-4efe-9843-3edbf3d3e6bb'
        icon: icons/eye.svg
        color_theme: pink
    type: icon_cards
    enabled: true
  -
    id: lcoohkf4
    images:
      - landenhof_gebaeude_gelaende/lh_anlage_2014_01.jpg
      - landenhof_gebaeude_gelaende/lh_anlage_2014_04.jpg
      - landenhof_gebaeude_gelaende/lh_anlage_2014_02.jpg
    type: images_as_shapes
    enabled: true
    overlap_top: medium
    overlap_bottom: small
  -
    id: lbyxvpy5
    heading: Events
    hasFilter: true
    show_all_events: false
    type: event_cards
    enabled: true
    events:
      - e8829a8d-fada-4a43-b15a-568f731780cf
  -
    id: ldyiuo82
    heading: 'News vom Landenhof'
    load_automatically: true
    amount_blog_posts: 6
    button_text: 'Zur Übersicht'
    button_link: 'entry::8e1e8a71-0dc7-4248-84e7-ab40f4e0a88d'
    type: blog_slider
    enabled: true
  -
    id: lewj7ilc
    heading: Dokumente
    files:
      -
        id: lewj7no9
        name: 'Ferientermine bis 2026'
        file: downloads/ferientermine_bis_2026.pdf
        open_in_tab: true
    button_text: 'Mehr anzeigen'
    type: downloads
    enabled: true
subtitle: 'Führendes Kompetenzzentrum'
link_text: 'Offene Stellen'
link: 'entry::84e9fa3c-6594-4ad9-ae73-2fffff6ab4c7'
color_theme: blue
lottie: lottie/startseite.json
seo_description_default: 'Der Landenhof unterstützt hör- und sehbeeinträchtigte Kinder & Jugendliche in ihrem selbstbestimmten Leben durch Förderung ihrer Fähigkeiten & Entwicklung'
seo_hidden: false
---
