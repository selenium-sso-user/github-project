Ext.define('strings.sample', {
    number: 1,
    numberAsStr: '1',
    isBoolean: true,
    emptyString: '',
    doubleQuotesString: 'Home',
    //main page button
    singleQuotesString: 'Back',
    entitiesString: 'Previous (Control+Left)',
    varString: '{0} (Пробіл)',
    graveAccentString: 'It`s {0} today',
    icuString: '{gender, select, male {He uses} female {She uses} other {They use} } Crowdin.',
    regExpString: '/\\[ux]([0-9a-fA-F]{2,4})/g',
    smileString: '🥴🥴🥴',
    variableString: `This is a ${ variable } test`
});
//object sample
var translatableObject = {
    name: 'Ross',
    gender: 'male',
    age: 31,
    isPhd: 'true',
    isFriend: `false`
};
var trArray = [
    //array sample
    'Joey',
    'Chandler',
    'Monica',
    `Rachel`
];