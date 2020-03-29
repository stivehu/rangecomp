    function sortNumber(a, b) {
        return a - b;
    }
    function rangeCompress(sourceArray) {
        if (!$.isArray(sourceArray)) {
            return [];
        }

        sourceArray.sort(sortNumber);
        result = [];
        first = sourceArray[0];
        more = false;
        for (i = 0; i < sourceArray.length; i++) {
            current = sourceArray[i];
            next = sourceArray[i + 1];
            if (current + 1 == next) {
                more = false;
            } else {
                more = true;
            }
            if (more) {
                more = false;
                if (first == current) {
                    result.push(current);
                } else {
                    result.push(first + '-' + current);
                }
                first = next;
            }
        }
        return result;
    }
    function rangeDeCompress(sourceArray) {
        result = [];
        for (i = 0; i < sourceArray.length; i++) {
            if ((typeof sourceArray[i] === 'number') && (sourceArray[i] % 1 === 0)) {
                result.push(parseInt(sourceArray[i]));
            } else {
                separator = sourceArray[i].indexOf('-');
                for (j = parseInt(sourceArray[i].substring(0, separator)); j <= parseInt(sourceArray[i].substring(separator + 1, sourceArray[i].length)); j++) {
                    result.push(parseInt(j));
                }
            }
        }
        return result;
    }    
    