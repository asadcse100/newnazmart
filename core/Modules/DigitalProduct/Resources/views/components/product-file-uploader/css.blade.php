<style>
    /* Plugin Style Start */
    .kwt-file {
        max-width: 380px;
    }
    .kwt-file__drop-area {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
        padding: 25px;
        background-color: #ffffff;
        border-radius: 12px;
        transition: 0.3s;
        padding-left: 0;
    }
    .kwt-file__drop-area.is-active {
        background-color: #d1def0;
    }
    .kwt-file__choose-file {
        flex-shrink: 0;
        background-color: var(--bs-info);
        border-radius: 100%;
        margin-right: 10px;
        color: #ffffff;
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .kwt-file__choose-file.kwt-file_btn-text {
        border-radius: 4px;
        width: auto;
        height: auto;
        padding: 10px 20px;
        font-size: 14px;
    }
    .kwt-file__choose-file svg {
        width: 24px;
        height: 24px;
        display: block;
    }
    .kwt-file__msg {
        color: #1d3557;
        font-size: 16px;
        font-weight: 400;
        line-height: 1.4;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .kwt-file__input {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        cursor: pointer;
        opacity: 0;
    }
    .kwt-file__input:focus {
        outline: none;
    }
    .kwt-file__delete {
        display: none;
        position: absolute;
        right: 10px;
        width: 18px;
        height: 18px;
        cursor: pointer;
    }
    .kwt-file__delete:before {
        content: "";
        position: absolute;
        left: 0;
        transition: 0.3s;
        top: 0;
        z-index: 1;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg fill='%231d3557' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 438.5 438.5'%3e%3cpath d='M417.7 75.7A8.9 8.9 0 00411 73H323l-20-47.7c-2.8-7-8-13-15.4-18S272.5 0 264.9 0h-91.3C166 0 158.5 2.5 151 7.4c-7.4 5-12.5 11-15.4 18l-20 47.7H27.4a9 9 0 00-6.6 2.6 9 9 0 00-2.5 6.5v18.3c0 2.7.8 4.8 2.5 6.6a8.9 8.9 0 006.6 2.5h27.4v271.8c0 15.8 4.5 29.3 13.4 40.4a40.2 40.2 0 0032.3 16.7H338c12.6 0 23.4-5.7 32.3-17.2a64.8 64.8 0 0013.4-41V109.6h27.4c2.7 0 4.9-.8 6.6-2.5a8.9 8.9 0 002.6-6.6V82.2a9 9 0 00-2.6-6.5zm-248.4-36a8 8 0 014.9-3.2h90.5a8 8 0 014.8 3.2L283.2 73H155.3l14-33.4zm177.9 340.6a32.4 32.4 0 01-6.2 19.3c-1.4 1.6-2.4 2.4-3 2.4H100.5c-.6 0-1.6-.8-3-2.4a32.5 32.5 0 01-6.1-19.3V109.6h255.8v270.7z'/%3e%3cpath d='M137 347.2h18.3c2.7 0 4.9-.9 6.6-2.6a9 9 0 002.5-6.6V173.6a9 9 0 00-2.5-6.6 8.9 8.9 0 00-6.6-2.6H137c-2.6 0-4.8.9-6.5 2.6a8.9 8.9 0 00-2.6 6.6V338c0 2.7.9 4.9 2.6 6.6a8.9 8.9 0 006.5 2.6zM210.1 347.2h18.3a8.9 8.9 0 009.1-9.1V173.5c0-2.7-.8-4.9-2.5-6.6a8.9 8.9 0 00-6.6-2.6h-18.3a8.9 8.9 0 00-9.1 9.1V338a8.9 8.9 0 009.1 9.1zM283.2 347.2h18.3c2.7 0 4.8-.9 6.6-2.6a8.9 8.9 0 002.5-6.6V173.6c0-2.7-.8-4.9-2.5-6.6a8.9 8.9 0 00-6.6-2.6h-18.3a9 9 0 00-6.6 2.6 8.9 8.9 0 00-2.5 6.6V338a9 9 0 002.5 6.6 9 9 0 006.6 2.6z'/%3e%3c/svg%3e");
    }
    .kwt-file__delete:after {
        content: "";
        position: absolute;
        opacity: 0;
        left: 50%;
        top: 50%;
        width: 100%;
        height: 100%;
        transform: translate(-50%, -50%) scale(0);
        background-color: #1d3557;
        border-radius: 50%;
        transition: 0.3s;
    }
    .kwt-file__delete:hover:after {
        transform: translate(-50%, -50%) scale(2.2);
        opacity: 0.1;
    }

    .kwt-file__drop-area {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
        padding: 15px;
        background-color: #ffffff;
        border-radius: 5px;
        transition: 0.3s;
        /* padding-left: 0; */
        border: 1px solid var(--bs-info);
        margin-top: 15px;
    }
    /* Plugin Style End */
</style>
