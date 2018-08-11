<?php
// $mpdf = new \Mpdf\Mpdf();
// $mpdf->AddFontDirectory($directory);
return [
    'font_path' => base_path('resources/fonts/'), // don't forget the trailing slash!
    // 'fontDir' => ('resources/fonts/'), // don't forget the trailing slash!
    'font_data' => [
    // 'fontData' => [
        "helveticaneueltstdmd" => [
            'R' => "HelveticaNeueLTStd-Md.ttf",    // regular font
            // 'B'  => 'Arial Bold.ttf',       // optional: bold font
            // 'I'  => 'Arial Italic.ttf',     // optional: italic font
            // 'BI' => 'Arial Bold Italic.ttf' // optional: bold-italic font
        ],
        'chalkduster' => [
            'R'  => 'Chalkduster.ttf',    // regular font
            // 'B'  => 'ExampleFont-Bold.ttf',       // optional: bold font
            // 'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            // 'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font
        ],
        'billabong' => [
            'R'  => 'Chalkduster.ttf',    // regular font
            // 'B'  => 'ExampleFont-Bold.ttf',       // optional: bold font
            // 'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            // 'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font
        ],
        'brushscript' => [
            'R'  => 'Brush Script.ttf',    // regular font
            // 'B'  => 'ExampleFont-Bold.ttf',       // optional: bold font
            // 'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            // 'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font
        ],
        'robotomedium' => [
            'R'  => 'Roboto-Medium.ttf',    // regular font
            // 'B'  => 'ExampleFont-Bold.ttf',       // optional: bold font
            // 'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            // 'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font
        ],
        'paintingwithchocolate' => [
            'R'  => 'Painting_With_Chocolate.ttf',    // regular font
            // 'B'  => 'ExampleFont-Bold.ttf',       // optional: bold font
            // 'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            // 'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font
        ],
        'notomonoregular' => [
            'R'  => 'NotoMono-Regular.ttf',    // regular font
            // 'B'  => 'ExampleFont-Bold.ttf',       // optional: bold font
            // 'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            // 'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font
        ],
        'helveticaneueltstdlt' => [
            'R'  => 'HelveticaNeueLTStd-Lt.ttf',    // regular font
            // 'B'  => 'ExampleFont-Bold.ttf',       // optional: bold font
            // 'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            // 'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font
        ]
        // ...add as many as you want.
    ]
];
