var wms_layers = [];


        var lyr_GoogleSatellite_0 = new ol.layer.Tile({
            'title': 'Google Satellite',
            'type':'base',
            'opacity': 0.500000,
            
            
            source: new ol.source.XYZ({
            attributions: ' ',
                url: 'https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}'
            })
        });
var format_Candon_Tsunami_1 = new ol.format.GeoJSON();
var features_Candon_Tsunami_1 = format_Candon_Tsunami_1.readFeatures(json_Candon_Tsunami_1, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_Candon_Tsunami_1 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_Candon_Tsunami_1.addFeatures(features_Candon_Tsunami_1);
var lyr_Candon_Tsunami_1 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_Candon_Tsunami_1, 
                style: style_Candon_Tsunami_1,
                popuplayertitle: "Candon_Tsunami",
                interactive: true,
    title: 'Candon_Tsunami<br />\
    <img src="styles/legend/Candon_Tsunami_1_0.png" /> < 1 meter<br />\
    <img src="styles/legend/Candon_Tsunami_1_1.png" /> 1 to 1.99 meters<br />\
    <img src="styles/legend/Candon_Tsunami_1_2.png" /> 2 to 2.99 meters<br />\
    <img src="styles/legend/Candon_Tsunami_1_3.png" /> 4 to 4.99 meters<br />\
    <img src="styles/legend/Candon_Tsunami_1_4.png" /> 5 to 6 meters<br />\
    <img src="styles/legend/Candon_Tsunami_1_5.png" /> > 6 meters<br />'
        });
var format_Candon_StormSurge_SSA4_2 = new ol.format.GeoJSON();
var features_Candon_StormSurge_SSA4_2 = format_Candon_StormSurge_SSA4_2.readFeatures(json_Candon_StormSurge_SSA4_2, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_Candon_StormSurge_SSA4_2 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_Candon_StormSurge_SSA4_2.addFeatures(features_Candon_StormSurge_SSA4_2);
var lyr_Candon_StormSurge_SSA4_2 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_Candon_StormSurge_SSA4_2, 
                style: style_Candon_StormSurge_SSA4_2,
                popuplayertitle: "Candon_StormSurge_SSA4",
                interactive: true,
    title: 'Candon_StormSurge_SSA4<br />\
    <img src="styles/legend/Candon_StormSurge_SSA4_2_0.png" /> 1 - 1.4<br />\
    <img src="styles/legend/Candon_StormSurge_SSA4_2_1.png" /> 1.4 - 1.8<br />\
    <img src="styles/legend/Candon_StormSurge_SSA4_2_2.png" /> 1.8 - 2.2<br />\
    <img src="styles/legend/Candon_StormSurge_SSA4_2_3.png" /> 2.2 - 2.6<br />\
    <img src="styles/legend/Candon_StormSurge_SSA4_2_4.png" /> 2.6 - 3<br />'
        });
var format_Candon_StormSurge_SSA3_3 = new ol.format.GeoJSON();
var features_Candon_StormSurge_SSA3_3 = format_Candon_StormSurge_SSA3_3.readFeatures(json_Candon_StormSurge_SSA3_3, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_Candon_StormSurge_SSA3_3 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_Candon_StormSurge_SSA3_3.addFeatures(features_Candon_StormSurge_SSA3_3);
var lyr_Candon_StormSurge_SSA3_3 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_Candon_StormSurge_SSA3_3, 
                style: style_Candon_StormSurge_SSA3_3,
                popuplayertitle: "Candon_StormSurge_SSA3",
                interactive: true,
    title: 'Candon_StormSurge_SSA3<br />\
    <img src="styles/legend/Candon_StormSurge_SSA3_3_0.png" /> 1 - 1.4<br />\
    <img src="styles/legend/Candon_StormSurge_SSA3_3_1.png" /> 1.4 - 1.8<br />\
    <img src="styles/legend/Candon_StormSurge_SSA3_3_2.png" /> 1.8 - 2.2<br />\
    <img src="styles/legend/Candon_StormSurge_SSA3_3_3.png" /> 2.2 - 2.6<br />\
    <img src="styles/legend/Candon_StormSurge_SSA3_3_4.png" /> 2.6 - 3<br />'
        });
var format_Candon_StormSurge_SSA2_4 = new ol.format.GeoJSON();
var features_Candon_StormSurge_SSA2_4 = format_Candon_StormSurge_SSA2_4.readFeatures(json_Candon_StormSurge_SSA2_4, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_Candon_StormSurge_SSA2_4 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_Candon_StormSurge_SSA2_4.addFeatures(features_Candon_StormSurge_SSA2_4);
var lyr_Candon_StormSurge_SSA2_4 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_Candon_StormSurge_SSA2_4, 
                style: style_Candon_StormSurge_SSA2_4,
                popuplayertitle: "Candon_StormSurge_SSA2",
                interactive: true,
    title: 'Candon_StormSurge_SSA2<br />\
    <img src="styles/legend/Candon_StormSurge_SSA2_4_0.png" /> 1 - 1.4<br />\
    <img src="styles/legend/Candon_StormSurge_SSA2_4_1.png" /> 1.4 - 1.8<br />\
    <img src="styles/legend/Candon_StormSurge_SSA2_4_2.png" /> 1.8 - 2.2<br />\
    <img src="styles/legend/Candon_StormSurge_SSA2_4_3.png" /> 2.2 - 2.6<br />\
    <img src="styles/legend/Candon_StormSurge_SSA2_4_4.png" /> 2.6 - 3<br />'
        });
var format_Candon_StormSurge_SSA1_5 = new ol.format.GeoJSON();
var features_Candon_StormSurge_SSA1_5 = format_Candon_StormSurge_SSA1_5.readFeatures(json_Candon_StormSurge_SSA1_5, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_Candon_StormSurge_SSA1_5 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_Candon_StormSurge_SSA1_5.addFeatures(features_Candon_StormSurge_SSA1_5);
var lyr_Candon_StormSurge_SSA1_5 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_Candon_StormSurge_SSA1_5, 
                style: style_Candon_StormSurge_SSA1_5,
                popuplayertitle: "Candon_StormSurge_SSA1",
                interactive: true,
    title: 'Candon_StormSurge_SSA1<br />\
    <img src="styles/legend/Candon_StormSurge_SSA1_5_0.png" /> 1 - 1.4<br />\
    <img src="styles/legend/Candon_StormSurge_SSA1_5_1.png" /> 1.4 - 1.8<br />\
    <img src="styles/legend/Candon_StormSurge_SSA1_5_2.png" /> 1.8 - 2.2<br />\
    <img src="styles/legend/Candon_StormSurge_SSA1_5_3.png" /> 2.2 - 2.6<br />\
    <img src="styles/legend/Candon_StormSurge_SSA1_5_4.png" /> 2.6 - 3<br />'
        });
var format_Candon_RainInducedLandslide_6 = new ol.format.GeoJSON();
var features_Candon_RainInducedLandslide_6 = format_Candon_RainInducedLandslide_6.readFeatures(json_Candon_RainInducedLandslide_6, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_Candon_RainInducedLandslide_6 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_Candon_RainInducedLandslide_6.addFeatures(features_Candon_RainInducedLandslide_6);
var lyr_Candon_RainInducedLandslide_6 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_Candon_RainInducedLandslide_6, 
                style: style_Candon_RainInducedLandslide_6,
                popuplayertitle: "Candon_RainInducedLandslide",
                interactive: true,
    title: 'Candon_RainInducedLandslide<br />\
    <img src="styles/legend/Candon_RainInducedLandslide_6_0.png" /> LL<br />\
    <img src="styles/legend/Candon_RainInducedLandslide_6_1.png" /> ML<br />\
    <img src="styles/legend/Candon_RainInducedLandslide_6_2.png" /> HL<br />'
        });
var format_Candon_Liquefaction_7 = new ol.format.GeoJSON();
var features_Candon_Liquefaction_7 = format_Candon_Liquefaction_7.readFeatures(json_Candon_Liquefaction_7, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_Candon_Liquefaction_7 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_Candon_Liquefaction_7.addFeatures(features_Candon_Liquefaction_7);
var lyr_Candon_Liquefaction_7 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_Candon_Liquefaction_7, 
                style: style_Candon_Liquefaction_7,
                popuplayertitle: "Candon_Liquefaction",
                interactive: true,
    title: 'Candon_Liquefaction<br />\
    <img src="styles/legend/Candon_Liquefaction_7_0.png" /> Least Susceptible<br />\
    <img src="styles/legend/Candon_Liquefaction_7_1.png" /> Moderately Susceptible<br />\
    <img src="styles/legend/Candon_Liquefaction_7_2.png" /> Higjhly Susceptible<br />'
        });
var format_Candon_LandslideHazards_8 = new ol.format.GeoJSON();
var features_Candon_LandslideHazards_8 = format_Candon_LandslideHazards_8.readFeatures(json_Candon_LandslideHazards_8, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_Candon_LandslideHazards_8 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_Candon_LandslideHazards_8.addFeatures(features_Candon_LandslideHazards_8);
var lyr_Candon_LandslideHazards_8 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_Candon_LandslideHazards_8, 
                style: style_Candon_LandslideHazards_8,
                popuplayertitle: "Candon_LandslideHazards",
                interactive: true,
    title: 'Candon_LandslideHazards<br />\
    <img src="styles/legend/Candon_LandslideHazards_8_0.png" /> 1 - 1.4<br />\
    <img src="styles/legend/Candon_LandslideHazards_8_1.png" /> 1.4 - 1.8<br />\
    <img src="styles/legend/Candon_LandslideHazards_8_2.png" /> 1.8 - 2.2<br />\
    <img src="styles/legend/Candon_LandslideHazards_8_3.png" /> 2.2 - 2.6<br />\
    <img src="styles/legend/Candon_LandslideHazards_8_4.png" /> 2.6 - 3<br />'
        });
var format_Candon_Flood_100year_9 = new ol.format.GeoJSON();
var features_Candon_Flood_100year_9 = format_Candon_Flood_100year_9.readFeatures(json_Candon_Flood_100year_9, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_Candon_Flood_100year_9 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_Candon_Flood_100year_9.addFeatures(features_Candon_Flood_100year_9);
var lyr_Candon_Flood_100year_9 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_Candon_Flood_100year_9, 
                style: style_Candon_Flood_100year_9,
                popuplayertitle: "Candon_Flood_100year",
                interactive: true,
    title: 'Candon_Flood_100year<br />\
    <img src="styles/legend/Candon_Flood_100year_9_0.png" /> 1 - 1.4<br />\
    <img src="styles/legend/Candon_Flood_100year_9_1.png" /> 1.4 - 1.8<br />\
    <img src="styles/legend/Candon_Flood_100year_9_2.png" /> 1.8 - 2.2<br />\
    <img src="styles/legend/Candon_Flood_100year_9_3.png" /> 2.2 - 2.6<br />\
    <img src="styles/legend/Candon_Flood_100year_9_4.png" /> 2.6 - 3<br />'
        });
var format_Tsunami_10 = new ol.format.GeoJSON();
var features_Tsunami_10 = format_Tsunami_10.readFeatures(json_Tsunami_10, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_Tsunami_10 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_Tsunami_10.addFeatures(features_Tsunami_10);
var lyr_Tsunami_10 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_Tsunami_10, 
                style: style_Tsunami_10,
                popuplayertitle: "Tsunami",
                interactive: true,
    title: 'Tsunami<br />\
    <img src="styles/legend/Tsunami_10_0.png" /> 01<br />\
    <img src="styles/legend/Tsunami_10_1.png" /> 02<br />\
    <img src="styles/legend/Tsunami_10_2.png" /> 03<br />\
    <img src="styles/legend/Tsunami_10_3.png" /> 05<br />\
    <img src="styles/legend/Tsunami_10_4.png" /> 06<br />\
    <img src="styles/legend/Tsunami_10_5.png" /> 07<br />'
        });
var format_RoadNetwork_11 = new ol.format.GeoJSON();
var features_RoadNetwork_11 = format_RoadNetwork_11.readFeatures(json_RoadNetwork_11, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_RoadNetwork_11 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_RoadNetwork_11.addFeatures(features_RoadNetwork_11);
var lyr_RoadNetwork_11 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_RoadNetwork_11, 
                style: style_RoadNetwork_11,
                popuplayertitle: "Road Network",
                interactive: true,
                title: '<img src="styles/legend/RoadNetwork_11.png" /> Road Network'
            });
var format_CandonBrgyBoundary_12 = new ol.format.GeoJSON();
var features_CandonBrgyBoundary_12 = format_CandonBrgyBoundary_12.readFeatures(json_CandonBrgyBoundary_12, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_CandonBrgyBoundary_12 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_CandonBrgyBoundary_12.addFeatures(features_CandonBrgyBoundary_12);
var lyr_CandonBrgyBoundary_12 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_CandonBrgyBoundary_12, 
                style: style_CandonBrgyBoundary_12,
                popuplayertitle: "Candon Brgy Boundary",
                interactive: true,
                title: '<img src="styles/legend/CandonBrgyBoundary_12.png" /> Candon Brgy Boundary'
            });
var format_11_GarbageandWasteDisposal_13 = new ol.format.GeoJSON();
var features_11_GarbageandWasteDisposal_13 = format_11_GarbageandWasteDisposal_13.readFeatures(json_11_GarbageandWasteDisposal_13, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_11_GarbageandWasteDisposal_13 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_11_GarbageandWasteDisposal_13.addFeatures(features_11_GarbageandWasteDisposal_13);
var lyr_11_GarbageandWasteDisposal_13 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_11_GarbageandWasteDisposal_13, 
                style: style_11_GarbageandWasteDisposal_13,
                popuplayertitle: "11_Garbage and Waste Disposal",
                interactive: true,
    title: '11_Garbage and Waste Disposal<br />\
    <img src="styles/legend/11_GarbageandWasteDisposal_13_0.png" /> 11_Garbage and Waste Disposal<br />'
        });
var format_10_TransportFacility_14 = new ol.format.GeoJSON();
var features_10_TransportFacility_14 = format_10_TransportFacility_14.readFeatures(json_10_TransportFacility_14, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_10_TransportFacility_14 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_10_TransportFacility_14.addFeatures(features_10_TransportFacility_14);
var lyr_10_TransportFacility_14 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_10_TransportFacility_14, 
                style: style_10_TransportFacility_14,
                popuplayertitle: "10_Transport Facility",
                interactive: true,
    title: '10_Transport Facility<br />\
    <img src="styles/legend/10_TransportFacility_14_0.png" /> 10_Transport Facility<br />'
        });
var format_09_TourismSitesandDestination_15 = new ol.format.GeoJSON();
var features_09_TourismSitesandDestination_15 = format_09_TourismSitesandDestination_15.readFeatures(json_09_TourismSitesandDestination_15, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_09_TourismSitesandDestination_15 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_09_TourismSitesandDestination_15.addFeatures(features_09_TourismSitesandDestination_15);
var lyr_09_TourismSitesandDestination_15 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_09_TourismSitesandDestination_15, 
                style: style_09_TourismSitesandDestination_15,
                popuplayertitle: "09_Tourism Sites and Destination",
                interactive: true,
    title: '09_Tourism Sites and Destination<br />\
    <img src="styles/legend/09_TourismSitesandDestination_15_0.png" /> 09_Tourism Sites and Destination<br />'
        });
var format_08_FinancialandCreditInstitutions_16 = new ol.format.GeoJSON();
var features_08_FinancialandCreditInstitutions_16 = format_08_FinancialandCreditInstitutions_16.readFeatures(json_08_FinancialandCreditInstitutions_16, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_08_FinancialandCreditInstitutions_16 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_08_FinancialandCreditInstitutions_16.addFeatures(features_08_FinancialandCreditInstitutions_16);
var lyr_08_FinancialandCreditInstitutions_16 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_08_FinancialandCreditInstitutions_16, 
                style: style_08_FinancialandCreditInstitutions_16,
                popuplayertitle: "08_Financial and Credit Institutions",
                interactive: true,
    title: '08_Financial and Credit Institutions<br />\
    <img src="styles/legend/08_FinancialandCreditInstitutions_16_0.png" /> 08_Financial and Credit Institutions<br />'
        });
var format_07_EnergyFacility_17 = new ol.format.GeoJSON();
var features_07_EnergyFacility_17 = format_07_EnergyFacility_17.readFeatures(json_07_EnergyFacility_17, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_07_EnergyFacility_17 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_07_EnergyFacility_17.addFeatures(features_07_EnergyFacility_17);
var lyr_07_EnergyFacility_17 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_07_EnergyFacility_17, 
                style: style_07_EnergyFacility_17,
                popuplayertitle: "07_Energy Facility",
                interactive: true,
    title: '07_Energy Facility<br />\
    <img src="styles/legend/07_EnergyFacility_17_0.png" /> 07_Energy Facility<br />'
        });
var format_06_WaterFacility_18 = new ol.format.GeoJSON();
var features_06_WaterFacility_18 = format_06_WaterFacility_18.readFeatures(json_06_WaterFacility_18, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_06_WaterFacility_18 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_06_WaterFacility_18.addFeatures(features_06_WaterFacility_18);
var lyr_06_WaterFacility_18 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_06_WaterFacility_18, 
                style: style_06_WaterFacility_18,
                popuplayertitle: "06_Water Facility",
                interactive: true,
    title: '06_Water Facility<br />\
    <img src="styles/legend/06_WaterFacility_18_0.png" /> 06_Water Facility<br />'
        });
var format_05_InputDealer_19 = new ol.format.GeoJSON();
var features_05_InputDealer_19 = format_05_InputDealer_19.readFeatures(json_05_InputDealer_19, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_05_InputDealer_19 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_05_InputDealer_19.addFeatures(features_05_InputDealer_19);
var lyr_05_InputDealer_19 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_05_InputDealer_19, 
                style: style_05_InputDealer_19,
                popuplayertitle: "05_Input Dealer",
                interactive: true,
    title: '05_Input Dealer<br />\
    <img src="styles/legend/05_InputDealer_19_0.png" /> 05_Input Dealer<br />'
        });
var format_04_AgriculturalFacility_20 = new ol.format.GeoJSON();
var features_04_AgriculturalFacility_20 = format_04_AgriculturalFacility_20.readFeatures(json_04_AgriculturalFacility_20, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_04_AgriculturalFacility_20 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_04_AgriculturalFacility_20.addFeatures(features_04_AgriculturalFacility_20);
var lyr_04_AgriculturalFacility_20 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_04_AgriculturalFacility_20, 
                style: style_04_AgriculturalFacility_20,
                popuplayertitle: "04_Agricultural Facility",
                interactive: true,
    title: '04_Agricultural Facility<br />\
    <img src="styles/legend/04_AgriculturalFacility_20_0.png" /> 04_Agricultural Facility<br />'
        });
var format_03_ServiceFacility_21 = new ol.format.GeoJSON();
var features_03_ServiceFacility_21 = format_03_ServiceFacility_21.readFeatures(json_03_ServiceFacility_21, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_03_ServiceFacility_21 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_03_ServiceFacility_21.addFeatures(features_03_ServiceFacility_21);
var lyr_03_ServiceFacility_21 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_03_ServiceFacility_21, 
                style: style_03_ServiceFacility_21,
                popuplayertitle: "03_Service Facility",
                interactive: true,
    title: '03_Service Facility<br />\
    <img src="styles/legend/03_ServiceFacility_21_0.png" /> 03_Service Facility<br />'
        });
var format_02_EducationFacility_22 = new ol.format.GeoJSON();
var features_02_EducationFacility_22 = format_02_EducationFacility_22.readFeatures(json_02_EducationFacility_22, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_02_EducationFacility_22 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_02_EducationFacility_22.addFeatures(features_02_EducationFacility_22);
var lyr_02_EducationFacility_22 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_02_EducationFacility_22, 
                style: style_02_EducationFacility_22,
                popuplayertitle: "02_Education Facility",
                interactive: true,
    title: '02_Education Facility<br />\
    <img src="styles/legend/02_EducationFacility_22_0.png" /> 02_Education Facility<br />'
        });
var format_01_HealthFacility_23 = new ol.format.GeoJSON();
var features_01_HealthFacility_23 = format_01_HealthFacility_23.readFeatures(json_01_HealthFacility_23, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_01_HealthFacility_23 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_01_HealthFacility_23.addFeatures(features_01_HealthFacility_23);
var lyr_01_HealthFacility_23 = new ol.layer.Vector({
                declutter: false,
                source:jsonSource_01_HealthFacility_23, 
                style: style_01_HealthFacility_23,
                popuplayertitle: "01_Health Facility",
                interactive: true,
    title: '01_Health Facility<br />\
    <img src="styles/legend/01_HealthFacility_23_0.png" /> 01_Health Facility<br />'
        });
var format_CBMS2023HH_24 = new ol.format.GeoJSON();
var features_CBMS2023HH_24 = format_CBMS2023HH_24.readFeatures(json_CBMS2023HH_24, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_CBMS2023HH_24 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_CBMS2023HH_24.addFeatures(features_CBMS2023HH_24);cluster_CBMS2023HH_24 = new ol.source.Cluster({
  distance: 10,
  source: jsonSource_CBMS2023HH_24
});
var lyr_CBMS2023HH_24 = new ol.layer.Vector({
                declutter: false,
                source:cluster_CBMS2023HH_24, 
                style: style_CBMS2023HH_24,
                popuplayertitle: "CBMS 2023 HH",
                interactive: true,
                title: '<img src="styles/legend/CBMS2023HH_24.png" /> CBMS 2023 HH'
            });
var group_Facilities = new ol.layer.Group({
                                layers: [lyr_11_GarbageandWasteDisposal_13,lyr_10_TransportFacility_14,lyr_09_TourismSitesandDestination_15,lyr_08_FinancialandCreditInstitutions_16,lyr_07_EnergyFacility_17,lyr_06_WaterFacility_18,lyr_05_InputDealer_19,lyr_04_AgriculturalFacility_20,lyr_03_ServiceFacility_21,lyr_02_EducationFacility_22,lyr_01_HealthFacility_23,],
                                fold: "open",
                                title: "Facilities"});
var group_Hazards = new ol.layer.Group({
                                layers: [lyr_Candon_Tsunami_1,lyr_Candon_StormSurge_SSA4_2,lyr_Candon_StormSurge_SSA3_3,lyr_Candon_StormSurge_SSA2_4,lyr_Candon_StormSurge_SSA1_5,lyr_Candon_RainInducedLandslide_6,lyr_Candon_Liquefaction_7,lyr_Candon_LandslideHazards_8,lyr_Candon_Flood_100year_9,lyr_Tsunami_10,],
                                fold: "open",
                                title: "Hazards"});

lyr_GoogleSatellite_0.setVisible(true);lyr_Candon_Tsunami_1.setVisible(false);lyr_Candon_StormSurge_SSA4_2.setVisible(false);lyr_Candon_StormSurge_SSA3_3.setVisible(false);lyr_Candon_StormSurge_SSA2_4.setVisible(false);lyr_Candon_StormSurge_SSA1_5.setVisible(false);lyr_Candon_RainInducedLandslide_6.setVisible(false);lyr_Candon_Liquefaction_7.setVisible(false);lyr_Candon_LandslideHazards_8.setVisible(false);lyr_Candon_Flood_100year_9.setVisible(false);lyr_Tsunami_10.setVisible(false);lyr_RoadNetwork_11.setVisible(true);lyr_CandonBrgyBoundary_12.setVisible(true);lyr_11_GarbageandWasteDisposal_13.setVisible(false);lyr_10_TransportFacility_14.setVisible(false);lyr_09_TourismSitesandDestination_15.setVisible(false);lyr_08_FinancialandCreditInstitutions_16.setVisible(false);lyr_07_EnergyFacility_17.setVisible(false);lyr_06_WaterFacility_18.setVisible(false);lyr_05_InputDealer_19.setVisible(false);lyr_04_AgriculturalFacility_20.setVisible(false);lyr_03_ServiceFacility_21.setVisible(false);lyr_02_EducationFacility_22.setVisible(false);lyr_01_HealthFacility_23.setVisible(false);lyr_CBMS2023HH_24.setVisible(false);
var layersList = [lyr_GoogleSatellite_0,group_Hazards,lyr_RoadNetwork_11,lyr_CandonBrgyBoundary_12,group_Facilities,lyr_CBMS2023HH_24];
lyr_Candon_Tsunami_1.set('fieldAliases', {'objectid': 'objectid', 'inundescod': 'inundescod', 'inundtcode': 'inundtcode', 'mappers': 'mappers', 'project': 'project', 'otherinfo': 'otherinfo', 'datemapped': 'datemapped', 'publishdat': 'publishdat', 'globalid': 'globalid', 'st_area(sh': 'st_area(sh', 'st_perimet': 'st_perimet', 'tsucode': 'tsucode', 'tsucodepk': 'tsucodepk', 'creator': 'creator', 'createdate': 'createdate', 'editor': 'editor', 'modifydate': 'modifydate', 'Depth': 'Depth', });
lyr_Candon_StormSurge_SSA4_2.set('fieldAliases', {'HAZ': 'HAZ', });
lyr_Candon_StormSurge_SSA3_3.set('fieldAliases', {'HAZ': 'HAZ', });
lyr_Candon_StormSurge_SSA2_4.set('fieldAliases', {'HAZ': 'HAZ', });
lyr_Candon_StormSurge_SSA1_5.set('fieldAliases', {'HAZ': 'HAZ', });
lyr_Candon_RainInducedLandslide_6.set('fieldAliases', {'objectid': 'objectid', 'lndslidesu': 'lndslidesu', 'rilscode': 'rilscode', 'gthcode': 'gthcode', 'created_us': 'created_us', 'created_da': 'created_da', 'last_edite': 'last_edite', 'last_edi_1': 'last_edi_1', 'globalid': 'globalid', 'st_area(sh': 'st_area(sh', 'st_perimet': 'st_perimet', });
lyr_Candon_Liquefaction_7.set('fieldAliases', {'objectid': 'objectid', 'lccode': 'lccode', 'liqcode': 'liqcode', 'mappers': 'mappers', 'project': 'project', 'province': 'province', 'otherinfo': 'otherinfo', 'datemapped': 'datemapped', 'publishdat': 'publishdat', 'globalid': 'globalid', 'st_area(sh': 'st_area(sh', 'st_perimet': 'st_perimet', 'liqcodepk': 'liqcodepk', 'creator': 'creator', 'createdate': 'createdate', 'editor': 'editor', 'modifydate': 'modifydate', 'codemove': 'codemove', 'Code Desc': 'Code Desc', });
lyr_Candon_LandslideHazards_8.set('fieldAliases', {'LH': 'LH', });
lyr_Candon_Flood_100year_9.set('fieldAliases', {'Var': 'Var', });
lyr_Tsunami_10.set('fieldAliases', {'objectid': 'objectid', 'inundescod': 'inundescod', 'inundtcode': 'inundtcode', 'mappers': 'mappers', 'project': 'project', 'otherinfo': 'otherinfo', 'datemapped': 'datemapped', 'publishdat': 'publishdat', 'globalid': 'globalid', 'st_area(sh': 'st_area(sh', 'st_perimet': 'st_perimet', 'tsucode': 'tsucode', 'tsucodepk': 'tsucodepk', 'creator': 'creator', 'createdate': 'createdate', 'editor': 'editor', 'modifydate': 'modifydate', 'Depth': 'Depth', });
lyr_RoadNetwork_11.set('fieldAliases', {'ENTITY': 'ENTITY', 'LAYER': 'LAYER', 'ELEVATION': 'ELEVATION', 'THICKNESS': 'THICKNESS', 'COLOR': 'COLOR', 'Name': 'Name', });
lyr_CandonBrgyBoundary_12.set('fieldAliases', {'ADM4_EN': 'ADM4_EN', 'ADM4_PCODE': 'ADM4_PCODE', 'ADM4_REF': 'ADM4_REF', 'ADM3_EN': 'ADM3_EN', 'ADM3_PCODE': 'ADM3_PCODE', 'ADM2_EN': 'ADM2_EN', 'ADM2_PCODE': 'ADM2_PCODE', 'ADM1_EN': 'ADM1_EN', 'ADM1_PCODE': 'ADM1_PCODE', 'ADM0_EN': 'ADM0_EN', 'ADM0_PCODE': 'ADM0_PCODE', 'date': 'date', 'validOn': 'validOn', 'validTo': 'validTo', 'Shape_Leng': 'Shape_Leng', 'Shape_Area': 'Shape_Area', 'AREA_SQKM': 'AREA_SQKM', 'FloodRisk': 'FloodRisk', 'LSlideRisk': 'LSlideRisk', 'StormSRisk': 'StormSRisk', 'TsunamRisk': 'TsunamRisk', 'TyphooRisk': 'TyphooRisk', });
lyr_11_GarbageandWasteDisposal_13.set('fieldAliases', {'reg_psgc': 'reg_psgc', 'prov_psgc': 'prov_psgc', 'mun_psgc': 'mun_psgc', 'bgy_psgc': 'bgy_psgc', 'eacode': 'eacode', 'struc_type': 'struc_type', 'geobsn2019': 'geobsn2019', 'fsn': 'fsn', 'name': 'name', 'address': 'address', 'ins_faci': 'ins_faci', 'type': 'type', 'subtype': 'subtype', 'usage': 'usage', 'other_use': 'other_use', 'source_inf': 'source_inf', 'MUNFSN': 'MUNFSN', 'usedby': 'usedby', 'SPECTYPE': 'SPECTYPE', 'GENTYPE': 'GENTYPE', 'FSNGeocode': 'FSNGeocode', });
lyr_10_TransportFacility_14.set('fieldAliases', {'reg_psgc': 'reg_psgc', 'prov_psgc': 'prov_psgc', 'mun_psgc': 'mun_psgc', 'bgy_psgc': 'bgy_psgc', 'eacode': 'eacode', 'struc_type': 'struc_type', 'geobsn2019': 'geobsn2019', 'fsn': 'fsn', 'name': 'name', 'address': 'address', 'ins_faci': 'ins_faci', 'type': 'type', 'subtype': 'subtype', 'usage': 'usage', 'other_use': 'other_use', 'source_inf': 'source_inf', 'MUNFSN': 'MUNFSN', 'usedby': 'usedby', 'SPECTYPE': 'SPECTYPE', 'GENTYPE': 'GENTYPE', 'FSNGeocode': 'FSNGeocode', });
lyr_09_TourismSitesandDestination_15.set('fieldAliases', {'reg_psgc': 'reg_psgc', 'prov_psgc': 'prov_psgc', 'mun_psgc': 'mun_psgc', 'bgy_psgc': 'bgy_psgc', 'eacode': 'eacode', 'struc_type': 'struc_type', 'geobsn2019': 'geobsn2019', 'fsn': 'fsn', 'name': 'name', 'address': 'address', 'ins_faci': 'ins_faci', 'type': 'type', 'subtype': 'subtype', 'usage': 'usage', 'other_use': 'other_use', 'source_inf': 'source_inf', 'MUNFSN': 'MUNFSN', 'usedby': 'usedby', 'SPECTYPE': 'SPECTYPE', 'GENTYPE': 'GENTYPE', 'FSNGeocode': 'FSNGeocode', });
lyr_08_FinancialandCreditInstitutions_16.set('fieldAliases', {'reg_psgc': 'reg_psgc', 'prov_psgc': 'prov_psgc', 'mun_psgc': 'mun_psgc', 'bgy_psgc': 'bgy_psgc', 'eacode': 'eacode', 'struc_type': 'struc_type', 'geobsn2019': 'geobsn2019', 'fsn': 'fsn', 'name': 'name', 'address': 'address', 'ins_faci': 'ins_faci', 'type': 'type', 'subtype': 'subtype', 'usage': 'usage', 'other_use': 'other_use', 'source_inf': 'source_inf', 'MUNFSN': 'MUNFSN', 'usedby': 'usedby', 'SPECTYPE': 'SPECTYPE', 'GENTYPE': 'GENTYPE', 'FSNGeocode': 'FSNGeocode', });
lyr_07_EnergyFacility_17.set('fieldAliases', {'reg_psgc': 'reg_psgc', 'prov_psgc': 'prov_psgc', 'mun_psgc': 'mun_psgc', 'bgy_psgc': 'bgy_psgc', 'eacode': 'eacode', 'struc_type': 'struc_type', 'geobsn2019': 'geobsn2019', 'fsn': 'fsn', 'name': 'name', 'address': 'address', 'ins_faci': 'ins_faci', 'type': 'type', 'subtype': 'subtype', 'usage': 'usage', 'other_use': 'other_use', 'source_inf': 'source_inf', 'MUNFSN': 'MUNFSN', 'usedby': 'usedby', 'SPECTYPE': 'SPECTYPE', 'GENTYPE': 'GENTYPE', 'FSNGeocode': 'FSNGeocode', });
lyr_06_WaterFacility_18.set('fieldAliases', {'reg_psgc': 'reg_psgc', 'prov_psgc': 'prov_psgc', 'mun_psgc': 'mun_psgc', 'bgy_psgc': 'bgy_psgc', 'eacode': 'eacode', 'struc_type': 'struc_type', 'geobsn2019': 'geobsn2019', 'fsn': 'fsn', 'name': 'name', 'address': 'address', 'ins_faci': 'ins_faci', 'type': 'type', 'subtype': 'subtype', 'usage': 'usage', 'other_use': 'other_use', 'source_inf': 'source_inf', 'MUNFSN': 'MUNFSN', 'usedby': 'usedby', 'SPECTYPE': 'SPECTYPE', 'GENTYPE': 'GENTYPE', 'FSNGeocode': 'FSNGeocode', });
lyr_05_InputDealer_19.set('fieldAliases', {'reg_psgc': 'reg_psgc', 'prov_psgc': 'prov_psgc', 'mun_psgc': 'mun_psgc', 'bgy_psgc': 'bgy_psgc', 'eacode': 'eacode', 'struc_type': 'struc_type', 'geobsn2019': 'geobsn2019', 'fsn': 'fsn', 'name': 'name', 'address': 'address', 'ins_faci': 'ins_faci', 'type': 'type', 'subtype': 'subtype', 'usage': 'usage', 'other_use': 'other_use', 'source_inf': 'source_inf', 'MUNFSN': 'MUNFSN', 'usedby': 'usedby', 'SPECTYPE': 'SPECTYPE', 'GENTYPE': 'GENTYPE', 'FSNGeocode': 'FSNGeocode', });
lyr_04_AgriculturalFacility_20.set('fieldAliases', {'reg_psgc': 'reg_psgc', 'prov_psgc': 'prov_psgc', 'mun_psgc': 'mun_psgc', 'bgy_psgc': 'bgy_psgc', 'eacode': 'eacode', 'struc_type': 'struc_type', 'geobsn2019': 'geobsn2019', 'fsn': 'fsn', 'name': 'name', 'address': 'address', 'ins_faci': 'ins_faci', 'type': 'type', 'subtype': 'subtype', 'usage': 'usage', 'other_use': 'other_use', 'source_inf': 'source_inf', 'MUNFSN': 'MUNFSN', 'usedby': 'usedby', 'SPECTYPE': 'SPECTYPE', 'GENTYPE': 'GENTYPE', 'FSNGeocode': 'FSNGeocode', });
lyr_03_ServiceFacility_21.set('fieldAliases', {'reg_psgc': 'reg_psgc', 'prov_psgc': 'prov_psgc', 'mun_psgc': 'mun_psgc', 'bgy_psgc': 'bgy_psgc', 'eacode': 'eacode', 'struc_type': 'struc_type', 'geobsn2019': 'geobsn2019', 'fsn': 'fsn', 'name': 'name', 'address': 'address', 'ins_faci': 'ins_faci', 'type': 'type', 'subtype': 'subtype', 'usage': 'usage', 'other_use': 'other_use', 'source_inf': 'source_inf', 'MUNFSN': 'MUNFSN', 'usedby': 'usedby', 'SPECTYPE': 'SPECTYPE', 'GENTYPE': 'GENTYPE', 'FSNGeocode': 'FSNGeocode', });
lyr_02_EducationFacility_22.set('fieldAliases', {'reg_psgc': 'reg_psgc', 'prov_psgc': 'prov_psgc', 'mun_psgc': 'mun_psgc', 'bgy_psgc': 'bgy_psgc', 'eacode': 'eacode', 'struc_type': 'struc_type', 'geobsn2019': 'geobsn2019', 'fsn': 'fsn', 'name': 'name', 'address': 'address', 'ins_faci': 'ins_faci', 'type': 'type', 'subtype': 'subtype', 'usage': 'usage', 'other_use': 'other_use', 'source_inf': 'source_inf', 'MUNFSN': 'MUNFSN', 'usedby': 'usedby', 'SPECTYPE': 'SPECTYPE', 'GENTYPE': 'GENTYPE', 'FSNGeocode': 'FSNGeocode', });
lyr_01_HealthFacility_23.set('fieldAliases', {'reg_psgc': 'reg_psgc', 'prov_psgc': 'prov_psgc', 'mun_psgc': 'mun_psgc', 'bgy_psgc': 'bgy_psgc', 'eacode': 'eacode', 'struc_type': 'struc_type', 'geobsn2019': 'geobsn2019', 'fsn': 'fsn', 'name': 'name', 'address': 'address', 'ins_faci': 'ins_faci', 'type': 'type', 'subtype': 'subtype', 'usage': 'usage', 'other_use': 'other_use', 'source_inf': 'source_inf', 'MUNFSN': 'MUNFSN', 'usedby': 'usedby', 'SPECTYPE': 'SPECTYPE', 'GENTYPE': 'GENTYPE', 'FSNGeocode': 'FSNGeocode', });
lyr_CBMS2023HH_24.set('fieldAliases', {'geoid': 'geoid', 'reg_psgc': 'reg_psgc', 'prov_psgc': 'prov_psgc', 'mun_psgc': 'mun_psgc', 'bgy_psgc': 'bgy_psgc', 'eacode': 'eacode', 'geobsn2019': 'geobsn2019', 'X': 'X', 'Y': 'Y', 'geocode': 'geocode', });
lyr_Candon_Tsunami_1.set('fieldImages', {'objectid': 'TextEdit', 'inundescod': 'TextEdit', 'inundtcode': 'TextEdit', 'mappers': 'TextEdit', 'project': 'TextEdit', 'otherinfo': 'TextEdit', 'datemapped': 'TextEdit', 'publishdat': 'TextEdit', 'globalid': 'TextEdit', 'st_area(sh': 'TextEdit', 'st_perimet': 'TextEdit', 'tsucode': 'TextEdit', 'tsucodepk': 'TextEdit', 'creator': 'TextEdit', 'createdate': 'TextEdit', 'editor': 'TextEdit', 'modifydate': 'TextEdit', 'Depth': 'TextEdit', });
lyr_Candon_StormSurge_SSA4_2.set('fieldImages', {'HAZ': 'TextEdit', });
lyr_Candon_StormSurge_SSA3_3.set('fieldImages', {'HAZ': 'TextEdit', });
lyr_Candon_StormSurge_SSA2_4.set('fieldImages', {'HAZ': 'TextEdit', });
lyr_Candon_StormSurge_SSA1_5.set('fieldImages', {'HAZ': 'TextEdit', });
lyr_Candon_RainInducedLandslide_6.set('fieldImages', {'objectid': 'TextEdit', 'lndslidesu': 'TextEdit', 'rilscode': 'TextEdit', 'gthcode': 'TextEdit', 'created_us': 'TextEdit', 'created_da': 'TextEdit', 'last_edite': 'TextEdit', 'last_edi_1': 'TextEdit', 'globalid': 'TextEdit', 'st_area(sh': 'TextEdit', 'st_perimet': 'TextEdit', });
lyr_Candon_Liquefaction_7.set('fieldImages', {'objectid': 'TextEdit', 'lccode': 'TextEdit', 'liqcode': 'TextEdit', 'mappers': 'TextEdit', 'project': 'TextEdit', 'province': 'TextEdit', 'otherinfo': 'TextEdit', 'datemapped': 'TextEdit', 'publishdat': 'TextEdit', 'globalid': 'TextEdit', 'st_area(sh': 'TextEdit', 'st_perimet': 'TextEdit', 'liqcodepk': 'TextEdit', 'creator': 'TextEdit', 'createdate': 'TextEdit', 'editor': 'TextEdit', 'modifydate': 'TextEdit', 'codemove': 'TextEdit', 'Code Desc': 'TextEdit', });
lyr_Candon_LandslideHazards_8.set('fieldImages', {'LH': 'TextEdit', });
lyr_Candon_Flood_100year_9.set('fieldImages', {'Var': 'TextEdit', });
lyr_Tsunami_10.set('fieldImages', {'objectid': 'TextEdit', 'inundescod': 'TextEdit', 'inundtcode': 'TextEdit', 'mappers': 'TextEdit', 'project': 'TextEdit', 'otherinfo': 'TextEdit', 'datemapped': 'TextEdit', 'publishdat': 'TextEdit', 'globalid': 'TextEdit', 'st_area(sh': 'TextEdit', 'st_perimet': 'TextEdit', 'tsucode': 'TextEdit', 'tsucodepk': 'TextEdit', 'creator': 'TextEdit', 'createdate': 'TextEdit', 'editor': 'TextEdit', 'modifydate': 'TextEdit', 'Depth': 'TextEdit', });
lyr_RoadNetwork_11.set('fieldImages', {'ENTITY': 'TextEdit', 'LAYER': 'TextEdit', 'ELEVATION': 'TextEdit', 'THICKNESS': 'TextEdit', 'COLOR': 'Range', 'Name': 'TextEdit', });
lyr_CandonBrgyBoundary_12.set('fieldImages', {'ADM4_EN': 'TextEdit', 'ADM4_PCODE': 'TextEdit', 'ADM4_REF': 'TextEdit', 'ADM3_EN': 'TextEdit', 'ADM3_PCODE': 'TextEdit', 'ADM2_EN': 'TextEdit', 'ADM2_PCODE': 'TextEdit', 'ADM1_EN': 'TextEdit', 'ADM1_PCODE': 'TextEdit', 'ADM0_EN': 'TextEdit', 'ADM0_PCODE': 'TextEdit', 'date': 'DateTime', 'validOn': 'DateTime', 'validTo': 'DateTime', 'Shape_Leng': 'TextEdit', 'Shape_Area': 'TextEdit', 'AREA_SQKM': 'TextEdit', 'FloodRisk': 'TextEdit', 'LSlideRisk': 'TextEdit', 'StormSRisk': 'TextEdit', 'TsunamRisk': 'TextEdit', 'TyphooRisk': 'TextEdit', });
lyr_11_GarbageandWasteDisposal_13.set('fieldImages', {'reg_psgc': 'TextEdit', 'prov_psgc': 'TextEdit', 'mun_psgc': 'TextEdit', 'bgy_psgc': 'TextEdit', 'eacode': 'TextEdit', 'struc_type': 'TextEdit', 'geobsn2019': 'TextEdit', 'fsn': 'TextEdit', 'name': 'TextEdit', 'address': 'TextEdit', 'ins_faci': 'TextEdit', 'type': 'TextEdit', 'subtype': 'TextEdit', 'usage': 'TextEdit', 'other_use': 'TextEdit', 'source_inf': 'TextEdit', 'MUNFSN': 'TextEdit', 'usedby': 'TextEdit', 'SPECTYPE': 'TextEdit', 'GENTYPE': 'TextEdit', 'FSNGeocode': 'TextEdit', });
lyr_10_TransportFacility_14.set('fieldImages', {'reg_psgc': 'TextEdit', 'prov_psgc': 'TextEdit', 'mun_psgc': 'TextEdit', 'bgy_psgc': 'TextEdit', 'eacode': 'TextEdit', 'struc_type': 'TextEdit', 'geobsn2019': 'TextEdit', 'fsn': 'TextEdit', 'name': 'TextEdit', 'address': 'TextEdit', 'ins_faci': 'TextEdit', 'type': 'TextEdit', 'subtype': 'TextEdit', 'usage': 'TextEdit', 'other_use': 'TextEdit', 'source_inf': 'TextEdit', 'MUNFSN': 'TextEdit', 'usedby': 'TextEdit', 'SPECTYPE': 'TextEdit', 'GENTYPE': 'TextEdit', 'FSNGeocode': 'TextEdit', });
lyr_09_TourismSitesandDestination_15.set('fieldImages', {'reg_psgc': 'TextEdit', 'prov_psgc': 'TextEdit', 'mun_psgc': 'TextEdit', 'bgy_psgc': 'TextEdit', 'eacode': 'TextEdit', 'struc_type': 'TextEdit', 'geobsn2019': 'TextEdit', 'fsn': 'TextEdit', 'name': 'TextEdit', 'address': 'TextEdit', 'ins_faci': 'TextEdit', 'type': 'TextEdit', 'subtype': 'TextEdit', 'usage': 'TextEdit', 'other_use': 'TextEdit', 'source_inf': 'TextEdit', 'MUNFSN': 'TextEdit', 'usedby': 'TextEdit', 'SPECTYPE': 'TextEdit', 'GENTYPE': 'TextEdit', 'FSNGeocode': 'TextEdit', });
lyr_08_FinancialandCreditInstitutions_16.set('fieldImages', {'reg_psgc': 'TextEdit', 'prov_psgc': 'TextEdit', 'mun_psgc': 'TextEdit', 'bgy_psgc': 'TextEdit', 'eacode': 'TextEdit', 'struc_type': 'TextEdit', 'geobsn2019': 'TextEdit', 'fsn': 'TextEdit', 'name': 'TextEdit', 'address': 'TextEdit', 'ins_faci': 'TextEdit', 'type': 'TextEdit', 'subtype': 'TextEdit', 'usage': 'TextEdit', 'other_use': 'TextEdit', 'source_inf': 'TextEdit', 'MUNFSN': 'TextEdit', 'usedby': 'TextEdit', 'SPECTYPE': 'TextEdit', 'GENTYPE': 'TextEdit', 'FSNGeocode': 'TextEdit', });
lyr_07_EnergyFacility_17.set('fieldImages', {'reg_psgc': 'TextEdit', 'prov_psgc': 'TextEdit', 'mun_psgc': 'TextEdit', 'bgy_psgc': 'TextEdit', 'eacode': 'TextEdit', 'struc_type': 'TextEdit', 'geobsn2019': 'TextEdit', 'fsn': 'TextEdit', 'name': 'TextEdit', 'address': 'TextEdit', 'ins_faci': 'TextEdit', 'type': 'TextEdit', 'subtype': 'TextEdit', 'usage': 'TextEdit', 'other_use': 'TextEdit', 'source_inf': 'TextEdit', 'MUNFSN': 'TextEdit', 'usedby': 'TextEdit', 'SPECTYPE': 'TextEdit', 'GENTYPE': 'TextEdit', 'FSNGeocode': 'TextEdit', });
lyr_06_WaterFacility_18.set('fieldImages', {'reg_psgc': 'TextEdit', 'prov_psgc': 'TextEdit', 'mun_psgc': 'TextEdit', 'bgy_psgc': 'TextEdit', 'eacode': 'TextEdit', 'struc_type': 'TextEdit', 'geobsn2019': 'TextEdit', 'fsn': 'TextEdit', 'name': 'TextEdit', 'address': 'TextEdit', 'ins_faci': 'TextEdit', 'type': 'TextEdit', 'subtype': 'TextEdit', 'usage': 'TextEdit', 'other_use': 'TextEdit', 'source_inf': 'TextEdit', 'MUNFSN': 'TextEdit', 'usedby': 'TextEdit', 'SPECTYPE': 'TextEdit', 'GENTYPE': 'TextEdit', 'FSNGeocode': 'TextEdit', });
lyr_05_InputDealer_19.set('fieldImages', {'reg_psgc': 'TextEdit', 'prov_psgc': 'TextEdit', 'mun_psgc': 'TextEdit', 'bgy_psgc': 'TextEdit', 'eacode': 'TextEdit', 'struc_type': 'TextEdit', 'geobsn2019': 'TextEdit', 'fsn': 'TextEdit', 'name': 'TextEdit', 'address': 'TextEdit', 'ins_faci': 'TextEdit', 'type': 'TextEdit', 'subtype': 'TextEdit', 'usage': 'TextEdit', 'other_use': 'TextEdit', 'source_inf': 'TextEdit', 'MUNFSN': 'TextEdit', 'usedby': 'TextEdit', 'SPECTYPE': 'TextEdit', 'GENTYPE': 'TextEdit', 'FSNGeocode': 'TextEdit', });
lyr_04_AgriculturalFacility_20.set('fieldImages', {'reg_psgc': 'TextEdit', 'prov_psgc': 'TextEdit', 'mun_psgc': 'TextEdit', 'bgy_psgc': 'TextEdit', 'eacode': 'TextEdit', 'struc_type': 'TextEdit', 'geobsn2019': 'TextEdit', 'fsn': 'TextEdit', 'name': 'TextEdit', 'address': 'TextEdit', 'ins_faci': 'TextEdit', 'type': 'TextEdit', 'subtype': 'TextEdit', 'usage': 'TextEdit', 'other_use': 'TextEdit', 'source_inf': 'TextEdit', 'MUNFSN': 'TextEdit', 'usedby': 'TextEdit', 'SPECTYPE': 'TextEdit', 'GENTYPE': 'TextEdit', 'FSNGeocode': 'TextEdit', });
lyr_03_ServiceFacility_21.set('fieldImages', {'reg_psgc': 'TextEdit', 'prov_psgc': 'TextEdit', 'mun_psgc': 'TextEdit', 'bgy_psgc': 'TextEdit', 'eacode': 'TextEdit', 'struc_type': 'TextEdit', 'geobsn2019': 'TextEdit', 'fsn': 'TextEdit', 'name': 'TextEdit', 'address': 'TextEdit', 'ins_faci': 'TextEdit', 'type': 'TextEdit', 'subtype': 'TextEdit', 'usage': 'TextEdit', 'other_use': 'TextEdit', 'source_inf': 'TextEdit', 'MUNFSN': 'TextEdit', 'usedby': 'TextEdit', 'SPECTYPE': 'TextEdit', 'GENTYPE': 'TextEdit', 'FSNGeocode': 'TextEdit', });
lyr_02_EducationFacility_22.set('fieldImages', {'reg_psgc': 'TextEdit', 'prov_psgc': 'TextEdit', 'mun_psgc': 'TextEdit', 'bgy_psgc': 'TextEdit', 'eacode': 'TextEdit', 'struc_type': 'TextEdit', 'geobsn2019': 'TextEdit', 'fsn': 'TextEdit', 'name': 'TextEdit', 'address': 'TextEdit', 'ins_faci': 'TextEdit', 'type': 'TextEdit', 'subtype': 'TextEdit', 'usage': 'TextEdit', 'other_use': 'TextEdit', 'source_inf': 'TextEdit', 'MUNFSN': 'TextEdit', 'usedby': 'TextEdit', 'SPECTYPE': 'TextEdit', 'GENTYPE': 'TextEdit', 'FSNGeocode': 'TextEdit', });
lyr_01_HealthFacility_23.set('fieldImages', {'reg_psgc': 'TextEdit', 'prov_psgc': 'TextEdit', 'mun_psgc': 'TextEdit', 'bgy_psgc': 'TextEdit', 'eacode': 'TextEdit', 'struc_type': 'TextEdit', 'geobsn2019': 'TextEdit', 'fsn': 'TextEdit', 'name': 'TextEdit', 'address': 'TextEdit', 'ins_faci': 'TextEdit', 'type': 'TextEdit', 'subtype': 'TextEdit', 'usage': 'TextEdit', 'other_use': 'TextEdit', 'source_inf': 'TextEdit', 'MUNFSN': 'TextEdit', 'usedby': 'TextEdit', 'SPECTYPE': 'TextEdit', 'GENTYPE': 'TextEdit', 'FSNGeocode': 'TextEdit', });
lyr_CBMS2023HH_24.set('fieldImages', {'geoid': 'TextEdit', 'reg_psgc': 'TextEdit', 'prov_psgc': 'TextEdit', 'mun_psgc': 'TextEdit', 'bgy_psgc': 'TextEdit', 'eacode': 'TextEdit', 'geobsn2019': 'TextEdit', 'X': 'TextEdit', 'Y': 'TextEdit', 'geocode': 'TextEdit', });
lyr_Candon_Tsunami_1.set('fieldLabels', {'objectid': 'hidden field', 'inundescod': 'hidden field', 'inundtcode': 'hidden field', 'mappers': 'hidden field', 'project': 'hidden field', 'otherinfo': 'hidden field', 'datemapped': 'hidden field', 'publishdat': 'hidden field', 'globalid': 'hidden field', 'st_area(sh': 'hidden field', 'st_perimet': 'hidden field', 'tsucode': 'hidden field', 'tsucodepk': 'hidden field', 'creator': 'hidden field', 'createdate': 'hidden field', 'editor': 'hidden field', 'modifydate': 'hidden field', 'Depth': 'hidden field', });
lyr_Candon_StormSurge_SSA4_2.set('fieldLabels', {'HAZ': 'hidden field', });
lyr_Candon_StormSurge_SSA3_3.set('fieldLabels', {'HAZ': 'hidden field', });
lyr_Candon_StormSurge_SSA2_4.set('fieldLabels', {'HAZ': 'hidden field', });
lyr_Candon_StormSurge_SSA1_5.set('fieldLabels', {'HAZ': 'hidden field', });
lyr_Candon_RainInducedLandslide_6.set('fieldLabels', {'objectid': 'hidden field', 'lndslidesu': 'hidden field', 'rilscode': 'hidden field', 'gthcode': 'hidden field', 'created_us': 'hidden field', 'created_da': 'hidden field', 'last_edite': 'hidden field', 'last_edi_1': 'hidden field', 'globalid': 'hidden field', 'st_area(sh': 'hidden field', 'st_perimet': 'hidden field', });
lyr_Candon_Liquefaction_7.set('fieldLabels', {'objectid': 'hidden field', 'lccode': 'hidden field', 'liqcode': 'hidden field', 'mappers': 'hidden field', 'project': 'hidden field', 'province': 'hidden field', 'otherinfo': 'hidden field', 'datemapped': 'hidden field', 'publishdat': 'hidden field', 'globalid': 'hidden field', 'st_area(sh': 'hidden field', 'st_perimet': 'hidden field', 'liqcodepk': 'hidden field', 'creator': 'hidden field', 'createdate': 'hidden field', 'editor': 'hidden field', 'modifydate': 'hidden field', 'codemove': 'hidden field', 'Code Desc': 'hidden field', });
lyr_Candon_LandslideHazards_8.set('fieldLabels', {'LH': 'hidden field', });
lyr_Candon_Flood_100year_9.set('fieldLabels', {'Var': 'hidden field', });
lyr_Tsunami_10.set('fieldLabels', {'objectid': 'hidden field', 'inundescod': 'hidden field', 'inundtcode': 'hidden field', 'mappers': 'hidden field', 'project': 'hidden field', 'otherinfo': 'hidden field', 'datemapped': 'hidden field', 'publishdat': 'hidden field', 'globalid': 'hidden field', 'st_area(sh': 'hidden field', 'st_perimet': 'hidden field', 'tsucode': 'hidden field', 'tsucodepk': 'hidden field', 'creator': 'hidden field', 'createdate': 'hidden field', 'editor': 'hidden field', 'modifydate': 'hidden field', 'Depth': 'hidden field', });
lyr_RoadNetwork_11.set('fieldLabels', {'ENTITY': 'hidden field', 'LAYER': 'hidden field', 'ELEVATION': 'hidden field', 'THICKNESS': 'header label - visible with data', 'COLOR': 'hidden field', 'Name': 'hidden field', });
lyr_CandonBrgyBoundary_12.set('fieldLabels', {'ADM4_EN': 'inline label - always visible', 'ADM4_PCODE': 'hidden field', 'ADM4_REF': 'hidden field', 'ADM3_EN': 'hidden field', 'ADM3_PCODE': 'hidden field', 'ADM2_EN': 'hidden field', 'ADM2_PCODE': 'hidden field', 'ADM1_EN': 'hidden field', 'ADM1_PCODE': 'hidden field', 'ADM0_EN': 'hidden field', 'ADM0_PCODE': 'hidden field', 'date': 'hidden field', 'validOn': 'hidden field', 'validTo': 'hidden field', 'Shape_Leng': 'hidden field', 'Shape_Area': 'hidden field', 'AREA_SQKM': 'hidden field', 'FloodRisk': 'hidden field', 'LSlideRisk': 'hidden field', 'StormSRisk': 'hidden field', 'TsunamRisk': 'hidden field', 'TyphooRisk': 'hidden field', });
lyr_11_GarbageandWasteDisposal_13.set('fieldLabels', {'reg_psgc': 'hidden field', 'prov_psgc': 'header label - always visible', 'mun_psgc': 'hidden field', 'bgy_psgc': 'hidden field', 'eacode': 'hidden field', 'struc_type': 'hidden field', 'geobsn2019': 'hidden field', 'fsn': 'hidden field', 'name': 'hidden field', 'address': 'hidden field', 'ins_faci': 'hidden field', 'type': 'inline label - visible with data', 'subtype': 'hidden field', 'usage': 'hidden field', 'other_use': 'inline label - visible with data', 'source_inf': 'hidden field', 'MUNFSN': 'hidden field', 'usedby': 'hidden field', 'SPECTYPE': 'hidden field', 'GENTYPE': 'hidden field', 'FSNGeocode': 'hidden field', });
lyr_10_TransportFacility_14.set('fieldLabels', {'reg_psgc': 'hidden field', 'prov_psgc': 'hidden field', 'mun_psgc': 'hidden field', 'bgy_psgc': 'hidden field', 'eacode': 'hidden field', 'struc_type': 'hidden field', 'geobsn2019': 'hidden field', 'fsn': 'hidden field', 'name': 'hidden field', 'address': 'hidden field', 'ins_faci': 'hidden field', 'type': 'inline label - visible with data', 'subtype': 'hidden field', 'usage': 'hidden field', 'other_use': 'inline label - visible with data', 'source_inf': 'hidden field', 'MUNFSN': 'hidden field', 'usedby': 'hidden field', 'SPECTYPE': 'hidden field', 'GENTYPE': 'hidden field', 'FSNGeocode': 'hidden field', });
lyr_09_TourismSitesandDestination_15.set('fieldLabels', {'reg_psgc': 'hidden field', 'prov_psgc': 'hidden field', 'mun_psgc': 'header label - always visible', 'bgy_psgc': 'hidden field', 'eacode': 'hidden field', 'struc_type': 'hidden field', 'geobsn2019': 'hidden field', 'fsn': 'hidden field', 'name': 'hidden field', 'address': 'hidden field', 'ins_faci': 'hidden field', 'type': 'inline label - visible with data', 'subtype': 'hidden field', 'usage': 'hidden field', 'other_use': 'inline label - visible with data', 'source_inf': 'hidden field', 'MUNFSN': 'hidden field', 'usedby': 'hidden field', 'SPECTYPE': 'hidden field', 'GENTYPE': 'hidden field', 'FSNGeocode': 'hidden field', });
lyr_08_FinancialandCreditInstitutions_16.set('fieldLabels', {'reg_psgc': 'hidden field', 'prov_psgc': 'hidden field', 'mun_psgc': 'hidden field', 'bgy_psgc': 'hidden field', 'eacode': 'hidden field', 'struc_type': 'hidden field', 'geobsn2019': 'hidden field', 'fsn': 'hidden field', 'name': 'hidden field', 'address': 'hidden field', 'ins_faci': 'hidden field', 'type': 'inline label - visible with data', 'subtype': 'hidden field', 'usage': 'hidden field', 'other_use': 'inline label - visible with data', 'source_inf': 'hidden field', 'MUNFSN': 'hidden field', 'usedby': 'hidden field', 'SPECTYPE': 'hidden field', 'GENTYPE': 'hidden field', 'FSNGeocode': 'hidden field', });
lyr_07_EnergyFacility_17.set('fieldLabels', {'reg_psgc': 'hidden field', 'prov_psgc': 'hidden field', 'mun_psgc': 'hidden field', 'bgy_psgc': 'hidden field', 'eacode': 'hidden field', 'struc_type': 'hidden field', 'geobsn2019': 'hidden field', 'fsn': 'hidden field', 'name': 'hidden field', 'address': 'hidden field', 'ins_faci': 'hidden field', 'type': 'inline label - visible with data', 'subtype': 'hidden field', 'usage': 'hidden field', 'other_use': 'inline label - visible with data', 'source_inf': 'hidden field', 'MUNFSN': 'hidden field', 'usedby': 'hidden field', 'SPECTYPE': 'hidden field', 'GENTYPE': 'hidden field', 'FSNGeocode': 'hidden field', });
lyr_06_WaterFacility_18.set('fieldLabels', {'reg_psgc': 'hidden field', 'prov_psgc': 'hidden field', 'mun_psgc': 'hidden field', 'bgy_psgc': 'hidden field', 'eacode': 'hidden field', 'struc_type': 'hidden field', 'geobsn2019': 'hidden field', 'fsn': 'hidden field', 'name': 'hidden field', 'address': 'hidden field', 'ins_faci': 'hidden field', 'type': 'inline label - visible with data', 'subtype': 'hidden field', 'usage': 'hidden field', 'other_use': 'inline label - visible with data', 'source_inf': 'hidden field', 'MUNFSN': 'hidden field', 'usedby': 'hidden field', 'SPECTYPE': 'hidden field', 'GENTYPE': 'hidden field', 'FSNGeocode': 'hidden field', });
lyr_05_InputDealer_19.set('fieldLabels', {'reg_psgc': 'hidden field', 'prov_psgc': 'hidden field', 'mun_psgc': 'hidden field', 'bgy_psgc': 'hidden field', 'eacode': 'hidden field', 'struc_type': 'hidden field', 'geobsn2019': 'hidden field', 'fsn': 'hidden field', 'name': 'hidden field', 'address': 'hidden field', 'ins_faci': 'hidden field', 'type': 'inline label - visible with data', 'subtype': 'hidden field', 'usage': 'hidden field', 'other_use': 'inline label - visible with data', 'source_inf': 'hidden field', 'MUNFSN': 'hidden field', 'usedby': 'hidden field', 'SPECTYPE': 'hidden field', 'GENTYPE': 'hidden field', 'FSNGeocode': 'hidden field', });
lyr_04_AgriculturalFacility_20.set('fieldLabels', {'reg_psgc': 'hidden field', 'prov_psgc': 'hidden field', 'mun_psgc': 'hidden field', 'bgy_psgc': 'hidden field', 'eacode': 'hidden field', 'struc_type': 'hidden field', 'geobsn2019': 'hidden field', 'fsn': 'hidden field', 'name': 'hidden field', 'address': 'hidden field', 'ins_faci': 'hidden field', 'type': 'inline label - visible with data', 'subtype': 'hidden field', 'usage': 'hidden field', 'other_use': 'inline label - visible with data', 'source_inf': 'hidden field', 'MUNFSN': 'hidden field', 'usedby': 'hidden field', 'SPECTYPE': 'hidden field', 'GENTYPE': 'hidden field', 'FSNGeocode': 'hidden field', });
lyr_03_ServiceFacility_21.set('fieldLabels', {'reg_psgc': 'hidden field', 'prov_psgc': 'hidden field', 'mun_psgc': 'hidden field', 'bgy_psgc': 'hidden field', 'eacode': 'hidden field', 'struc_type': 'hidden field', 'geobsn2019': 'hidden field', 'fsn': 'hidden field', 'name': 'hidden field', 'address': 'hidden field', 'ins_faci': 'hidden field', 'type': 'inline label - visible with data', 'subtype': 'hidden field', 'usage': 'hidden field', 'other_use': 'inline label - visible with data', 'source_inf': 'hidden field', 'MUNFSN': 'hidden field', 'usedby': 'hidden field', 'SPECTYPE': 'hidden field', 'GENTYPE': 'hidden field', 'FSNGeocode': 'hidden field', });
lyr_02_EducationFacility_22.set('fieldLabels', {'reg_psgc': 'hidden field', 'prov_psgc': 'hidden field', 'mun_psgc': 'hidden field', 'bgy_psgc': 'hidden field', 'eacode': 'hidden field', 'struc_type': 'hidden field', 'geobsn2019': 'hidden field', 'fsn': 'hidden field', 'name': 'hidden field', 'address': 'hidden field', 'ins_faci': 'hidden field', 'type': 'inline label - visible with data', 'subtype': 'hidden field', 'usage': 'hidden field', 'other_use': 'inline label - visible with data', 'source_inf': 'hidden field', 'MUNFSN': 'hidden field', 'usedby': 'hidden field', 'SPECTYPE': 'hidden field', 'GENTYPE': 'hidden field', 'FSNGeocode': 'hidden field', });
lyr_01_HealthFacility_23.set('fieldLabels', {'reg_psgc': 'hidden field', 'prov_psgc': 'hidden field', 'mun_psgc': 'hidden field', 'bgy_psgc': 'hidden field', 'eacode': 'hidden field', 'struc_type': 'hidden field', 'geobsn2019': 'hidden field', 'fsn': 'hidden field', 'name': 'hidden field', 'address': 'hidden field', 'ins_faci': 'hidden field', 'type': 'inline label - visible with data', 'subtype': 'hidden field', 'usage': 'hidden field', 'other_use': 'inline label - visible with data', 'source_inf': 'hidden field', 'MUNFSN': 'hidden field', 'usedby': 'hidden field', 'SPECTYPE': 'hidden field', 'GENTYPE': 'hidden field', 'FSNGeocode': 'hidden field', });
lyr_CBMS2023HH_24.set('fieldLabels', {'geoid': 'hidden field', 'reg_psgc': 'hidden field', 'prov_psgc': 'hidden field', 'mun_psgc': 'hidden field', 'bgy_psgc': 'hidden field', 'eacode': 'hidden field', 'geobsn2019': 'hidden field', 'X': 'hidden field', 'Y': 'hidden field', 'geocode': 'hidden field', });
lyr_CBMS2023HH_24.on('precompose', function(evt) {
    evt.context.globalCompositeOperation = 'normal';
});