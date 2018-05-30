<?php
return [
    'custom_font_path' => base_path('/resources/fonts/'), // don't forget the trailing slash!
    'custom_font_data' => [
        'helveticaneueltstdlt' => [
            'R'  => 'HelveticaNeueLTStd-Lt.ttf',    // regular font
            'B'  => 'HelveticaNeueLTStd-Md.ttf',       // optional: bold font
            // 'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            // 'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font
        ],
        'helveticaneueltstdmd' => [
            'R'  => 'HelveticaNeueLTStd-Md.ttf',    // regular font
            // 'B'  => 'ExampleFont-Bold.ttf',       // optional: bold font
            // 'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            // 'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font
        ],'helveticaneuereg' => [
            'R'  => 'HelveticaNeue.ttf',    // regular font
            // 'B'  => 'ExampleFont-Bold.ttf',       // optional: bold font
            // 'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            // 'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font
        ]
        // ...add as many as you want.
    ]
];