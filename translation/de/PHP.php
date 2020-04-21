<?php

$array1 = [
    'BLOCK_CLASS' => 'CSS Class',
    'BLOCK_DESIGN' => 'Appearance',
];

$array12 = array(
    'BLOCK_CLASS' => 'CSS Class2222',
    'BLOCK_DESIGN' => 'Appearance2222',
);

$lang22 = array_merge($array12, array(
    'ADD_BLOCK_EXPLAIN' => '*Drag and Drop blocks2',
    'AJAX_LOADING' => 'Loading2...',
    'AJAX_PROCESSING' => 'Working2...',
));

$lang = array_merge($array1, [
    'ADD_BLOCK_EXPLAIN' => '*Drag and Drop blocks',
    'AJAX_LOADING' => 'Loading...',
    'AJAX_PROCESSING' => 'Working...',
]);

$lang = array_merge($lang, [
    'ADD_BLOCK_EXPLAIN1' => 'winter',
    'AJAX_LOADING1' => 'summer',
    'AJAX_PROCESSING1' => 'sprint',
]);

$day = array_merge(
    [
        'ADD_BLOCK_EXPLAIN2' => 'Sunday',
        'AJAX_LOADING2' => 'Monday',
        'AJAX_PROCESSING2' => 'Friday',
    ],
    $lang
);

$month = array_merge($lang,
    [
        'ADD_BLOCK_EXPLAIN3' => 'January',
        'AJAX_LOADING3' => 'August',
        'AJAX_PROCESSING3' => 'July',
    ]);

$color = array_merge($lang,
    [
        'ADD_BLOCK_EXPLAIN4' => 'gray',
        'AJAX_LOADING5' => 'blue',
        'AJAX_PROCESSING5' => 'yellow',
    ]);

$var1 = 'text';

$array2 = ["one", "two", "three", "four", "five", "six"];

$lang = array_merge(['foo', 'bar', 'baz', 'lorem', 'ipsum'], $array2);

return [

    'home' => 'Home',
    'login' => 'Login',
  'speakers' => 'Speakers',
  'congregations' => 'Congregations',
  'noCongregations' => 'There\'s no congregations.',
  'family' => [
          'father' => 'John',
          'mother' => 'Susan',
          'children' => [
               'son' => 'Jimmy',
          ],
  ],
  'plural' => 'one apple|a million apples'
];
