<style>
    .modal .loading .modal-content:before {
        content: 'Cargando...';
        text-align: center;
        line-height: 155px;
        font-size: 20px;
        background: rgba(0, 0, 0, .8);
        position: absolute;
        top: 55px;
        bottom: 0;
        left: 0;
        right: 0;
        color: #EEE;
        z-index: 1000;
    }

    body::-webkit-scrollbar {
        width: 15px;
        /* width of the entire scrollbar */
    }

    body::-webkit-scrollbar-track {
        background: #000;
        /* color of the tracking area */
    }

    body::-webkit-scrollbar-thumb {
        background-color: #7539FF;
        /* color of the scroll thumb */
        border-radius: 20px;
        /* roundness of the scroll thumb */
        border: 3px solid #000;
        /* creates padding around scroll thumb */
    }

    .saludo {
        background-color: #7539FF;
        color: #EEE;
        padding: 10px;
        margin-top: -7px;
    }

    #sidebar {
        overflow-y: auto !important;
        margin-bottom: 47px !important;
    }

    #sidebar::-webkit-scrollbar {
        width: 7px;
        /* width of the entire scrollbar */
    }

    #sidebar::-webkit-scrollbar-track {
        background: #000;
        /* color of the tracking area */
    }

    #sidebar::-webkit-scrollbar-thumb {
        background-color: #7539FF;
        /* color of the scroll thumb */
        border-radius: 20px;
        /* roundness of the scroll thumb */
        border: 0.5px solid #000;
        /* creates padding around scroll thumb */
    }

    .datetimepicker {
        z-index: 1600 !important;
    }

    #scrolltop {
        position: fixed;
        font-size: 23px;
        bottom: 20px;
        right: 20px;
        background-color: #007bff;
        border-radius: 52%;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        opacity: 0.7;
        display: none;
        z-index: 2;
    }

    #scrolltop:hover {
        opacity: 1;
    }
</style>
