//Ext.BLANK_IMAGE_URL = '/ext/resources/images/default/s.gif';
Ext.ns('Example');

        var store = new Ext.data.JsonStore({
        url: 'http://zf1-stud.local/news/list?format=json',
                root: 'news',
                idProperty: 'id',
                fields: ['id', 'head', 'anons', 'time_cd', 'txt'],
                remoteSort: true
                });
        Ext.onReady(function() {
        var grid = new Ext.grid.GridPanel({
        title: 'Новости',
                store: store,
                columns: [
                {header: "ID", width: 30, dataIndex: 'id',
                        sortable: true, hidden: true},
                {id: 'title', header: "Новости", width: 100,
                        dataIndex: 'head', sortable: true},
                {header: "Анонс", width: 350, dataIndex: 'anons',
                        sortable: true},
                {header: "Создана", width: 120, dataIndex: 'time_cd',
                        sortable: true, align: 'center'},
                {header: 'action', xtype: 'actioncolumn',
                        iconCls: 'delete-icon', text: 'Delete',
                        name: 'deleteBtn', handler: function(grid, rowIndex, colIndex, item, e) {                        
                       var data=grid.store.getAt(rowIndex);
                       Ext.Ajax.request({
 
  url: 'http://zf1-stud.local/news/delete',

  params:{
      id: data.id,
 format: 'json'
  },
  method:'GET',
  success: function(result, request){
      console.log(result);
               grid.store.removeAt(rowIndex);
  }
});

                        
                        }
                }
                
        ],
        
                autoExpandColumn: 'title',
                renderTo: Ext.getBody(),
                width: 978,
                height: 300,
                loadMask: true,
                columnLines: true



        });
                store.load();
                });
                
                