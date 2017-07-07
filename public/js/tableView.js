restaurant.tableView = function () {
    this.initComponent();
}

restaurant.tableView.prototype = {
    initComponent: function () {
        this.attachListeners();
    },
    attachListeners: function () {
        $('.edit-table-button').on('click', $.proxy(this.onEditTableClick, this));
        $('#modal-tables-save-btn').on('click', $.proxy(this.onSaveTableClick, this));
        $('#modal-tables-hide-btn').on('click', $.proxy(this.onCloseTableClick, this));
        $('#add-table-btn').on('click', $.proxy(this.onAddTableClick, this));
        $('#modal-add-tables-save-btn').on('click', $.proxy(this.onSaveAddTableClick, this));

    },
    onSaveAddTableClick: function (e) {
        var tableNo = $('#modal-add-table-number').val();
        var pin = $('#modal-add-table-password').val();
        var zoneId = $('#modal-add-table-zone-select').val();
        var data = {
            tableNo: tableNo,
            pin: pin,
            zoneId: zoneId
        };
        $.ajax({
            method: 'POST',
            url: restaurant.serverPath + '/restaurant/management/table/add',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(data),
            success: $.proxy(function (response) {
                console.log('Success', response);
            }, this),
            error: function (response) {
                console.log('Something went wrong', response);
            }
        });
        $('#table-add-modal').modal('hide');
        location.assign('http://localhost:8000/restaurant/management/tables')
    },
    onAddTableClick: function (e) {
        var currentTarget = $(e.currentTarget);
        zones = currentTarget.data('zones');
        $('#table-add-modal').modal('show');
        this.loadAddTableModalWindow(zones);
    },
    loadAddTableModalWindow: function (zones) {
        var select = $('#modal-add-table-zone-select');

        select.find('option').remove().end();

        for (var i = 0; i < zones.length; i++) {
            var opt = zones[i];

            var el = '<option value="' + opt.zone + '">Zone ' + opt.zone + '</option>';

            select.append(el);
        }
    },
    onCloseTableClick: function (e) {
        console.log('hide');
        $('#table-edit-modal').modal('hide');
    },
    onEditTableClick: function (e) {
        var currentTarget = $(e.currentTarget);
        this.table = currentTarget.data('table');
        this.zones = currentTarget.data('zones');
        $('#table-edit-modal').modal('show');
        this.loadModalWindow({table: this.table, zones: this.zones});
    },
    onSaveTableClick: function (e) {
        var tableNo = $('#modal-table-number').val();
        var pin = $('#modal-table-password').val();
        var zoneId = $('#modal-zone-select').val();
        var data = {
            tableId: this.table.id,
            tableNo: tableNo,
            pin: pin,
            zoneId: zoneId
        };
        $.ajax({
            method: 'POST',
            url: restaurant.serverPath + 'restaurant/management/table/update',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(data),
            success: $.proxy(function (response) {
                console.log('Success', response);
            }, this),
            error: function (response) {
                console.log('Something went wrong', response);
            }
        });
        $('#table-edit-modal').modal('hide');
        location.assign('http://localhost:8000/restaurant/management/tables')

    },
    loadModalWindow: function (config) {
        $('#modal-table-number').val(config.table.tableNo);
        $('#modal-table-password').val(config.table.tablePassword);

        var select = $('#modal-zone-select');

        select.find('option').remove().end();

        for (var i = 0; i < config.zones.length; i++) {
            var opt = config.zones[i];
            if (opt.zone === config.table.zone) {
                var el = '<option value="' + opt.zone + '"selected>Zone ' + opt.zone + '</option>';
            } else {
                var el = '<option value="' + opt.zone + '" >Zone ' + opt.zone + '</option>';
            }

            select.append(el);
        }
    }
};

$(document).ready(function () {
    var something = new restaurant.tableView();
});