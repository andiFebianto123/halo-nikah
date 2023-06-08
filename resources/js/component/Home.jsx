import * as $ from 'jquery';
import Box from './Box';

export default function Home() {
    const heading = "Iki latihan nggo react cuk";
    return(
        <>
            { console.log($) }
            <div>{heading}</div>
            <Box />
        </>
    )
}