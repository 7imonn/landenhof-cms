---
id: c0a53f6a-b1db-4743-8846-000e71cc87a1
blueprint: page
title: Startseite
updated_by: 04e1ae9a-6ef8-4ba0-931b-7cd69cc0d3a2
updated_at: 1676237524
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
            link_title: Hörabklärung
            link: 'entry::3de3de24-dda7-4c6f-afb0-4eb25597ee51'
          -
            id: lcovz5nz
            link_title: 'Tagesschule für Hörbeeinträchtigte'
            link: 'entry::c0a53f6a-b1db-4743-8846-000e71cc87a1'
        icon: icons/ear.svg
        color_theme: green
      -
        id: lcovzgdx
        title: Sehen
        text: 'Erfahren Sie mehr über unsere Angebote für sehbeeinträchtigte Kinder und Jugendliche'
        links:
          -
            id: lcow04lv
            link_title: 'Low Vision Abklärung'
            link: 'entry::c0a53f6a-b1db-4743-8846-000e71cc87a1'
          -
            id: lcow05d8
            link_title: 'Heilpädagogische Früherziehung'
            link: 'entry::c0a53f6a-b1db-4743-8846-000e71cc87a1'
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
    id: ld1mit7e
    heading: 'Erfahren Sie mehr'
    button_link: 'entry::c0a53f6a-b1db-4743-8846-000e71cc87a1'
    type: slider
    enabled: true
    entries:
      - d9ac90a1-1787-428c-8a75-00d9b358488b
      - c9f21a0b-2b88-4980-bf2e-b4fc15a16a6e
    button_text: 'Mehr anzeigen'
  -
    id: lbyxvpy5
    heading: Events
    hasFilter: false
    show_all_events: false
    type: event_cards
    enabled: true
    events:
      - 6c6037b3-2852-4603-aa21-98e3ab7f2588
      - 5b596dce-7e3e-4c35-861f-f618479b449b
      - 49423da3-d9cc-4b0a-ba84-6ffbfa9f4574
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
    id: lck78318
    heading: Downloads
    files:
      -
        id: lck787r8
        file: downloads/lh_jahresbericht_2020_21.PDF
        open_in_tab: true
        name: 'Jahresbericht 2021/22'
    type: downloads
    enabled: true
    button_text: 'Mehr anzeigen'
    link: 'entry::3de3de24-dda7-4c6f-afb0-4eb25597ee51'
subtitle: 'Führendes Kompetenzzentrum'
link_text: 'Offene Stellen'
link: 'entry::40db808b-3908-4d7d-bb3f-008dbcfd17d8'
color_theme: blue
lottie: lottie/lottie_startseite.json
seo_description_default: 'Der Landenhof unterstützt hör- und sehbeeinträchtigte Kinder & Jugendliche in ihrem selbstbestimmten Leben durch Förderung ihrer Fähigkeiten & Entwicklung'
seo_hidden: false
---
