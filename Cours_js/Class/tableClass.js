class Table {
    constructor(titleTab, dataSource, fieldToShow) {
        this.titleTab = titleTab; //en-tête
        this.dataSource = dataSource; //données
        this.fieldToShow = fieldToShow; //ce qu'on veut afficher
    }

    //construction en-tête
    headTable() {
        let headTable = "<tr>";
        for (let i = 0; i < this.titleTab.length; i++) {
            headTable += '<td style="width:25%">' + this.titleTab[i] + '</td>'; //cellule
        }
        headTable += "</tr>";
        return headTable;
    }

    setTableDataSource(dataSource) {
        this.dataSource = dataSource;
    }

    //construction tableau
    addLineTable() {
        let dataSourceHTML = "";
        //boucle données
        this.dataSource.forEach(element => {
            dataSourceHTML += "<tr>";
            this.fieldToShow.forEach((field) => {
                if (field == 'Photo') {
                    dataSourceHTML += '<td class="border"><img class="imgSize" src=\'' + element[field] + '\'/></td>';
                    dataSourceHTML += "<td><button>Modifier</button><button id='delete' class='delete'>Supprimer</button></td>";
                } else {
                    dataSourceHTML += '<td class="border">' + element[field] + '</td>';
                }
            })
            dataSourceHTML += "</tr>";
        });
        return dataSourceHTML;
    }

    constituateTable() {
        let headHTML = this.headTable();
        let coreDataHTML = this.addLineTable();

        return headHTML + coreDataHTML;
    }

    deleteData(nom, prenom) {
        let index = this.dataSource.findIndex(data => data.Nom === nom && data.Prenom === prenom);
        if (index != -1) {
            //let data = this.datasource.splice(index, 1);
            this.dataSource.splice(index, 1);
            localStorage.setItem('data', JSON.stringify(this.dataSource));
            //this.setTableDataSource(data);
        }
    }
}