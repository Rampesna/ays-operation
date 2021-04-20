<link href="{{ asset('assets/plugins/custom/kanban/kanban.bundle.css') }}" rel="stylesheet" type="text/css"/>

<style>
    .kanban-board-header {
        margin-bottom: -20px;
    }

    .kanban-container .kanban-board {
        float: none;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        margin-bottom: 1.25rem;
        margin-right: 1.25rem !important;
        background-color: transparent;
        border-radius: 0.42rem;
    }

    .kanban-container .kanban-board .kanban-drag .kanban-item {
        border-radius: 1rem;
        -webkit-box-shadow: 0px 0px 13px 0px rgba(0, 0, 0, 0.05);
        box-shadow: 0px 0px 13px 0px rgba(0, 0, 0, 0.05);
    }

    .offcanvas.offcanvas-show-recruiting {
        right: -800px;
        left: auto;
    }

    .offcanvas.offcanvas-show-recruiting.offcanvas-on {
        -webkit-transition: left 0.3s ease, right 0.3s ease, bottom 0.3s ease, top 0.3s ease;
        transition: left 0.3s ease, right 0.3s ease, bottom 0.3s ease, top 0.3s ease;
        right: 0;
        left: auto;
    }
</style>
