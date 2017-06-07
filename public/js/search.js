var search = instantsearch({
  // Replace with your own values
  appId: 'CW3EQFE2BI',
  apiKey: 'cc0b6333a5a5fcffde48adb94ae20daf', // search only API key, no ADMIN key
  indexName: 'rooms',
  urlSync: true
});

search.addWidget(
  instantsearch.widgets.searchBox({
    container: '#search-input',
    placeholder: 'No to szukaj :-)'
  })
);

search.addWidget(
  instantsearch.widgets.hits({
    container: '#hits',
    hitsPerPage: 5,
    templates: {
      item: getTemplate('hit'),
      empty: getTemplate('no-results')
    }
  })
);

search.addWidget(
  instantsearch.widgets.stats({
    container: '#stats'
  })
);

search.addWidget(
  instantsearch.widgets.pagination({
    container: '#pagination'
  })
);

// Filter on categories
search.addWidget(
  instantsearch.widgets.refinementList({
    container: '#type',
    attributeName: 'type',
    limit: 5,
    sortBy: ['isRefined', 'count:desc', 'name:asc'],
    operator: 'or',
    templates: {
      header: '<h5>Rodzaj obiektu</h5>'
    }
  })
);

search.start();

function getTemplate(templateName) {
  return document.getElementById(templateName + '-template').innerHTML;
}