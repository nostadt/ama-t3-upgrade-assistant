
// @see https://stackoverflow.com/a/41998497
var isSyncingLeftScroll = false;
var isSyncingRightScroll = false;

function bindScroll() {
    leftDiv.onscroll = function() {
        if (!isSyncingLeftScroll) {
            isSyncingRightScroll = true;
            rightDiv.scrollTop = this.scrollTop;
            rightDiv.scrollLeft = this.scrollLeft;
        }
        isSyncingLeftScroll = false;
    };

    rightDiv.onscroll = function() {
        if (!isSyncingRightScroll) {
            isSyncingLeftScroll = true;
            leftDiv.scrollTop = this.scrollTop;
            leftDiv.scrollLeft = this.scrollLeft;
        }
        isSyncingRightScroll = false;
    };
}
function unbindScroll() {
    leftDiv.onscroll = null;
    rightDiv.onscroll = null;
}

function bindClickHandling() {
    document.getElementById('stopParallelScroll').addEventListener('click', function() {
        unbindScroll();
        document.getElementById('startParallelScroll').style.display = 'inline-block';
        document.getElementById('stopParallelScroll').style.display = 'none';
    });

    document.getElementById('startParallelScroll').addEventListener('click', function() {
        bindScroll();
        document.getElementById('startParallelScroll').style.display = 'none';
        document.getElementById('stopParallelScroll').style.display = 'inline-block';
    });
}