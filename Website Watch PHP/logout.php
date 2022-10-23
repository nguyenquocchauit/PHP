<?php
    //  *
    // * session_start ();
    // * Bắt đầu một phiên mới trước khi xóa nó
    // * đảm bảo với bạn rằng tất cả các vars $ _SESSION đều được xóa
    // * chính xác, nhưng nó không hoàn toàn cần thiết.
    // * 
    session_destroy();
    session_unset();
    header("Refresh:0");
    //  * Hoặc bất kỳ tài liệu nào bạn muốn hiển thị sau đó (quay về home) * 
?>