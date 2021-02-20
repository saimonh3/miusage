/**
 * Import styles
 */
import "./../scss/style.scss";

;( function( $ ) {
    const miusageUsersTable = {
        payload: {
            action: 'users-loads',
            nonce: miusageAssets.nonce,
            ajaxURL: miusageAssets.ajax_url
        },

        async render() {
            try {
                const response = await this.fetch();
                this.insertTable( response );
            } catch ( error ) {
                console.log( error );
            }
        },

        /**
         * Fetch the results from database
         *
         * @returns {Promise<*>}
         */
        fetch() {
            return $.post( this.payload.ajaxURL, {
                nonce: this.payload.nonce,
                action: this.payload.action,
            });
        },

        /**
         * Insert data to DOM
         *
         * @param response
         */
        insertTable( response ) {
            if ( ! response ) {
                return;
            }

            const table = $( '.awesomemotive-miusage-users table' );
            const headers = this.getHeaders( response );
            const users = this.getUsers( response );
            const tableHead = table.find( 'thead' );
            const tableBody = table.find( 'tbody' );

            if ( ! headers || ! users ) {
                return;
            }

            $( headers ).each( ( key, title ) => {
                $( tableHead ).append( `<td>${title}</td>` );
            });

            $( users ).each( (key, value) => {
                let html = '<tr>';
                Object.values( value ).forEach( user => {
                    html += `<td>${user?.id}</td>`;
                    html += `<td>${user?.fname}</td>`;
                    html += `<td>${user?.lname}</td>`;
                    html += `<td>${user?.email}</td>`;
                    html += `<td>${user?.date}</td>`;
                    html += '</tr>'
                });
                tableBody.append( html );
            });
        },

        /**
         * Get a list of users
         *
         * @param response
         * @return {boolean|{}}
         */
        getUsers( response ) {
            if ( ! response?.data?.rows ) {
                return false;
            }

            return response.data.rows;
        },

        /**
         *
         * @param response
         * @return {boolean|{}}
         */
        getHeaders( response ) {
            if ( ! response?.data?.headers ) {
                return false;
            }

            return response.data.headers;
        }
    }

    try {
        miusageUsersTable.render();
    } catch ( error ) {
        console.log( error );
    }

}) ( jQuery );