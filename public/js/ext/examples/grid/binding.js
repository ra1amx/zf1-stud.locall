
Ext.onReady(function(){
	
    // create the Data Store
    var store = new Ext.data.JsonStore({
    url: 'http://zf1-stud.local/news/list?format=json',
    root: 'news',
    idProperty: 'id',
    fields: ['id', 'head', 'anons', 'time_cd', 'txt'],
    remoteSort: true
});
        

    // create the grid
    var grid = new Ext.grid.GridPanel({
        store: store,
        columns: [
            {header: "head", width: 120, dataIndex: 'head', sortable: true},
            {header: "anons", width: 180, dataIndex: 'anons', sortable: true},
            {header: "txt", width: 115, dataIndex: 'txt', sortable: true},
            
        ],
		sm: new Ext.grid.RowSelectionModel({singleSelect: true}),
		viewConfig: {
			forceFit: true
		},
        height:210,
		split: true,
		region: 'north'
    });
	
	// define a template to use for the detail view
	var bookTplMarkup = [
		'head: <a href="{DetailPageURL}" target="_blank">{head}</a><br/>',
		'anons: {anons}<br/>',
		'txt: {txt}<br/>'
		
	];
	var bookTpl = new Ext.Template(bookTplMarkup);

	var ct = new Ext.Panel({
		renderTo: 'binding-example',
		frame: true,
		title: 'news list',
		width: 540,
		height: 400,
		layout: 'border',
		items: [
			grid,
			{
				id: 'detailPanel',
				region: 'center',
				bodyStyle: {
					background: '#ffffff',
					padding: '7px'
				},
				html: 'Please select a book to see additional details.'
			}
		]
	})
	grid.getSelectionModel().on('rowselect', function(sm, rowIdx, r) {
		var detailPanel = Ext.getCmp('detailPanel');
		bookTpl.overwrite(detailPanel.body, r.data);
	});
    store.load();
});