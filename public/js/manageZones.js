/**
 * Created by andreiiorga on 04/07/2017.
 */
restaurant.manageZones = function (){
    this.initComponent();
}

restaurant.manageZones.prototype = {
    initComponent: function () {
        this.attachListeners();
    },
    attachListeners: function () {
        $('#add-zone-btn').on('click', $.proxy(this.onAddZoneClick, this));
        $('#modal-add-zone-btn').on('click', $.proxy(this.onAddNewZoneClick, this));

    },
    onAddZoneClick: function (e) {
        var currentTarget = $(e.currentTarget);
        $('#add-zone-modal').modal('show');
    },
    onAddNewZoneClick: function (e) {
        var zoneNo = $('#modal-add-zone-zoneNo').val();
        var data = {
            zoneNo: zoneNo,
        };
        $.ajax({
            method: 'POST',
            url: restaurant.serverPath + '/restaurant/management/zone/add',
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
        $('#add-zone-modal').modal('hide');
        location.assign('http://localhost:8000/restaurant/management/zones')

    }

}

$(document).ready(function () {
    var something = new restaurant.manageZones();
});