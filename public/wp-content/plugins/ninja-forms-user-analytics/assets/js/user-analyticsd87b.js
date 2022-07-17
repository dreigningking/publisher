/*
 * Initialize JavaScript for the NF User Analytics plugin.
 */
jQuery( document ).ready( function ( $ ) {
    
    /**
     * Controller for the plugin.
     */
    var NFUserAnalyticsController = Marionette.Object.extend( {
        
        /**
         * Functionality to detect which browser and browser version is used.
         */
        DetectBrowser: {
            init: function () {
                this.browser = this.searchString( this.dataBrowser ) || "Unknown browser";
                this.version = this.searchVersion( navigator.userAgent ) || this.searchVersion( navigator.appVersion ) || "Unknown version";
            },
            searchString: function ( data ) {
                for ( var i = 0; i < data.length; i++ ) {
                    var dataString = data[ i ].string;
                    var dataProp = data[ i ].prop;
                    this.versionSearchString = data[ i ].versionSearch || data[ i ].identity;
                    if ( dataString ) {
                        if ( dataString.indexOf( data[ i ].subString ) != -1 ) {
                            return data[ i ].identity;
                        }
                    }
                    else if ( dataProp ) {
                        return data[ i ].identity;
                    }
                }
            },
            searchVersion: function ( dataString ) {
                var index = dataString.indexOf( this.versionSearchString );
                if ( index == -1 ) return;
                return parseFloat( dataString.substring( index + this.versionSearchString.length + 1 ) );
            },
            dataBrowser: [
                {
                    string: navigator.userAgent,
                    subString: "Chrome",
                    identity: "Chrome"
                }, {
                    string: navigator.userAgent,
                    subString: "OmniWeb",
                    versionSearch: "OmniWeb/",
                    identity: "OmniWeb"
                }, {
                    string: navigator.vendor,
                    subString: "Apple",
                    identity: "Safari",
                    versionSearch: "Version"
                }, {
                    prop: window.opera,
                    identity: "Opera"
                }, {
                    string: navigator.vendor,
                    subString: "iCab",
                    identity: "iCab"
                }, {
                    string: navigator.vendor,
                    subString: "KDE",
                    identity: "Konqueror"
                }, {
                    string: navigator.userAgent,
                    subString: "Firefox",
                    identity: "Firefox"
                }, {
                    string: navigator.vendor,
                    subString: "Camino",
                    identity: "Camino"
                }, { // for newer Netscapes (6+)
                    string: navigator.userAgent,
                    subString: "Netscape",
                    identity: "Netscape"
                }, {
                    string: navigator.userAgent,
                    subString: "MSIE",
                    identity: "Internet Explorer",
                    versionSearch: "MSIE"
                }, {
                    string: navigator.userAgent,
                    subString: "Gecko",
                    identity: "Mozilla",
                    versionSearch: "rv"
                }, { // for older Netscapes (4-)
                    string: navigator.userAgent,
                    subString: "Mozilla",
                    identity: "Netscape",
                    versionSearch: "Mozilla"
                } ]
        },
        
        hostInfoData: [],

        /**
         * Initialize the plugin.
         */
        initialize: function() {
            this.DetectBrowser.init();
            this.listenTo( nfRadio.channel( 'form' ), 'render:view', this.updateFormByView );
        },
        
        /**
         * Update the form when the view is rendered
         * 
         * @param object view Rendered view
         */
        updateFormByView: function( view ) {
            var self = this;
            
            this.updateForm( $( view.el ) );
            
            /**
             * Request info about the client's host through external service.
             */
            $.getJSON( nfua.ajax_url, {
                action: 'ninjaforms_useranalytics_data'
            } ).done( function ( hostInfoData ) {
                self.hostInfoData = hostInfoData;
                self.updateForm( $( view.el ) );
            } );
        },
        
        /**
         * Update the form by filling in the User Analytics fields.
         * 
         * @param object $form Form element on the page
         */
        updateForm: function( $form ) {
            var data = {
                'browser': this.DetectBrowser.browser,
                'browser-version': this.DetectBrowser.version,
                'city': this.hostInfoData['city'] || 'n/a',
                'country': this.hostInfoData['country_name'] || 'n/a',
                'latitude': this.hostInfoData['latitude'] || 'n/a',
                'longitude': this.hostInfoData['longitude'] || 'n/a',
                'os': window.navigator.platform,
                'region': this.hostInfoData['region_name'] || 'n/a'
            };
            
            for ( var key in data ) {
                var value = data[key];
                var $el = $form.find( '.user-analytics-' + key + '-container' + ' .nf-element' );
                if ( $el.length ) {
                    $el.val( value ).trigger( 'change' );
                }
            }
        },

    } );
    
    new NFUserAnalyticsController();

} );